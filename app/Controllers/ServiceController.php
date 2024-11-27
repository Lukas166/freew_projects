<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\UserModel;
use App\Models\TransactionModel;

class ServiceController extends BaseController
{
    public function searching()
    {
        $ServiceModel = new ServiceModel();
        
        $servicetype = $this->request->getPost('search');
        $servicetype = $servicetype ?? '';
        
        $limit = 9;
        
        $page = (int) ($this->request->getVar('page') ?? 1);
        
        $offset = ($page - 1) * $limit;
    
        $builder = $ServiceModel->join('users', 'service.selling_id = users.user_id', 'left')
            ->select('service.*, users.username')
            ->limit($limit, $offset);
        
        if (!empty($servicetype)) {
            $service = $builder->like('service_type', $servicetype)
                ->limit($limit, $offset)
                ->findAll();
        } else {
            $service = $builder->limit($limit, $offset)->findAll();
        }
        
        $total = $ServiceModel->like('service_type', $servicetype)->countAllResults();
        
        $pager = \Config\Services::pager();
        $pagination = $pager->makeLinks($page, $limit, $total);
    
        return view('services', ['service' => $service, 'pager' => $pagination, 'page' => $page, 'total' => $total, 'limit' => $limit]);
    }   

    public function inputServicePage(){
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost([
                'serviceType',
                'price',
                'description',
            ]);
    
            $ServiceData = [
                'service_type'        => $data['serviceType'],
                'description_service' => $data['description'],
                'price'               => $data['price'],
                'selling_id'          => $this->request->getCookie('userid'), 
            ];
    
            $ServiceModel = new ServiceModel();
            if ($ServiceModel->insert($ServiceData)) {
                return redirect()->to('/services')->with('success', 'Request added!');
            } else {
                echo $ServiceModel->errors();
                echo $this->db->getLastQuery();
            }
        }
        return view('input_services');
    }

    public function serviceDetailPage($serviceid){
        $serviceModel = new ServiceModel();

        $builder = $serviceModel->db->table('service')
            ->select('service.*, users.*, biodata.*')
            ->join('users', 'users.user_id = service.selling_id')
            ->join('biodata', 'users.Biodata_ID = biodata.Biodata_ID')
            ->where('service.service_id', $serviceid);

        $serviceData = $builder->get()->getRowArray();

        if ($this->request->getMethod() === "POST") {
            $transactionModel = new TransactionModel();

            $requestoffer = $this->request->getPost('requestoffer');
            $offerprice = $this->request->getPost('offerprice');

            if($serviceData['selling_id'] == $this->request->getCookie('userid')){
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'You cannot make an offer on your own service!'
                ]);
            }

            $inserted = $transactionModel->insert([
                'Type' => 'notseen',
                'OfferDescription' => $requestoffer,
                'OfferPrice' => $offerprice,
                'Status' => 'pending_service',
                'Service_ID' => $serviceData['service_id'],
                'Request_ID' => null,
                'User_ID' => $this->request->getCookie('userid')
            ]);

            if ($inserted) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Offer has been sent!',
                    'redirect' => '/notification'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to send offer. Please try again.'
                ]);
            }
        }

        return view('serviceDetails', ['service' => $serviceData]);
    }
}
