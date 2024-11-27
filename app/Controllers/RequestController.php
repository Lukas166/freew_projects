<?php

namespace App\Controllers;

use App\Models\RequestModel;
use App\Models\TransactionModel;

class RequestController extends BaseController
{
    public function searching()
    {
        $RequestModel = new RequestModel();
        
        $title = $this->request->getPost('search');
        $title = $title ?? '';
        
        $limit = 6;
        
        $page = (int) ($this->request->getVar('page') ?? 1);
        
        $offset = ($page - 1) * $limit;
    
        $builder = $RequestModel->join('users', 'request.buying_id = users.user_id', 'left')
            ->select('request.*, users.username')
            ->limit($limit, $offset);
        
        if (!empty($title)) {
            $req = $builder->like('Title', $title)
                ->limit($limit, $offset)
                ->findAll();
        } else {
            $req = $builder->limit($limit, $offset)->findAll();
        }
        
        $total = $RequestModel->like('Title', $title)->countAllResults();
        
        $pager = \Config\Services::pager();
        $pagination = $pager->makeLinks($page, $limit, $total);
    
        return view('request', ['req' => $req, 'pager' => $pagination, 'page' => $page, 'total' => $total, 'limit' => $limit]);
    }   

    public function inputRequestPage(){
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost([
                'title',
                'description',
                'jobRequirement',
                'minbudget',
                'maxbudget',
            ]);
    
            $requestData = [
                'Title'               => $data['title'],
                'description_request' => $data['description'],
                'Job_requirement'     => $data['jobRequirement'],
                'Min_budget'          => $data['minbudget'],
                'Max_budget'          => $data['maxbudget'],
                'Buying_ID'           => $this->request->getCookie('userid'), 
            ];
    
            $requestModel = new RequestModel();
            if ($requestModel->insert($requestData)) {
                return redirect()->to('/request')->with('success', 'Request added successfully!');
            } else {
                echo $requestModel->errors();
                echo $this->db->getLastQuery();
            }
        }
        return view('input_request');
    }

    public function requestDetailPage($requestid)
    {
        $RequestModel = new RequestModel();
    
        $builder = $RequestModel->db->table('request')
            ->select('request.*, users.*, biodata.*')
            ->join('users', 'users.user_id = request.buying_id')
            ->join('biodata', 'users.Biodata_ID = biodata.Biodata_ID')
            ->where('request.request_id', $requestid);
    
        $requestData = $builder->get()->getRowArray();
    
        if ($this->request->getMethod() === "POST") {
            $transactionModel = new TransactionModel();

            $requestoffer = $this->request->getPost('requestoffer');
            $offerprice = $this->request->getPost('offerprice');

            if($requestData['Buying_ID'] == $this->request->getCookie('userid')){
                session()->setFlashdata('message', $message);
                return view('requestDetails', ['request' => $requestData]);
            }

            $transactionModel->insert([
                'Type' => 'notseen',
                'OfferDescription' => $requestoffer,
                'OfferPrice' => $offerprice,
                'Status' => 'pending_request',
                'Service_ID' => null,
                'Request_ID' => $requestData['Request_ID'],
                'User_ID' => $this->request->getCookie('userid')
            ]);

            return redirect()->to('/notification');
        }
    
        return view('requestDetails', ['request' => $requestData]);
    }
}
