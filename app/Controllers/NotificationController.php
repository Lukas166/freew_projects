<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\TransactionModel;
use App\Models\BiodataModel;
use App\Models\UserModel;

class NotificationController extends BaseController
{
    public function notification()
    {
        $transactionModel = new TransactionModel();
        
        $limit = 10;
        
        $page = (int) ($this->request->getVar('page') ?? 1);
        
        $offset = ($page - 1) * $limit;
        
        $userid = $this->request->getCookie('userid');
        
        $builder = $transactionModel->table('transaction')
            ->select('*')
            ->join('service', 'service.service_id = transaction.service_id', 'left')
            ->join('request', 'request.request_id = transaction.request_id', 'left')
            ->join('users', 'users.user_id = service.selling_id OR users.user_id = request.buying_id', 'left')
            ->join('biodata', 'biodata.biodata_id = users.biodata_id', 'left')
            ->where('service.selling_id', $userid)
            ->orWhere('request.buying_id', $userid)
            ->orWhere('transaction.user_id', $userid)
            ->limit($limit, $offset)
            ->orderBy("CASE 
                WHEN transaction.status = 'pending_service' THEN 1
                WHEN transaction.status = 'pending_request' THEN 2
                WHEN transaction.status = 'accepted_service' THEN 3
                WHEN transaction.status = 'accepted_request' THEN 4
                WHEN transaction.status = 'declined_service' THEN 5
                WHEN transaction.status = 'declined_request' THEN 6
                WHEN transaction.status = 'finished_service' THEN 7
                WHEN transaction.status = 'finished_request' THEN 8
                WHEN transaction.status = 'finished_service_r' THEN 9
                ELSE 10
            END", 'ASC');
    
    
        $notif = $builder->get()->getResult();

        $total = $transactionModel->table('transaction')
            ->join('service', 'service.service_id = transaction.service_id', 'left')
            ->join('request', 'request.request_id = transaction.request_id', 'left')
            ->join('users', 'users.user_id = service.selling_id OR users.user_id = request.buying_id', 'left') 
            ->join('biodata', 'biodata.biodata_id = users.biodata_id', 'left')
            ->where('service.selling_id', $userid)
            ->orWhere('request.buying_id', $userid)
            ->orWhere('transaction.user_id', $userid)
            ->countAllResults();

        $pager = \Config\Services::pager();
        $pagination = $pager->makeLinks($page, $limit, $total);

        return view('notification', [
            'notif' => $notif,
            'pager' => $pagination,
            'page' => $page,
            'total' => $total,
            'limit' => $limit
        ]);
    }

    public function updateStatus()
    {
        $transactionId = $this->request->getPost('transaction_id');
        $status = $this->request->getPost('status');

        if (empty($transactionId) || empty($status)) {
            return 'error';
        }

        $transactionModel = new TransactionModel();

        $updated = $transactionModel->update($transactionId, ['Status' => $status]);

        if ($updated) {
            return 'success';
        } else {
            return 'error';
        }
    }

    public function submitRating()
    {
        $rating = $this->request->getPost('rating');
        $sellingId = $this->request->getPost('selling_id');
    
        $UserModel = new UserModel();
        $BiodataModel = new BiodataModel();
    
        $user = $UserModel->where('user_id', $sellingId)->first();
    
        if (!$user) {
            return $this->response->setStatusCode(404)->setBody('User not found');
        }
    
        $biodata = $BiodataModel->where('Biodata_ID', $user['Biodata_ID'])->first();
    
        if (!$biodata) {
            return $this->response->setStatusCode(404)->setBody('Biodata not found');
        }
    
        $RatingAmount = (int) $biodata['RatingAmount'] + 1;
        $RatingStar = (int) $biodata['RatingStar'] + (int) $rating;
    
        $data = [
            'RatingAmount' => $RatingAmount,
            'RatingStar'   => $RatingStar
        ];
    
        if ($BiodataModel->update($user['Biodata_ID'], $data)) {
            return $this->response->setBody('success');
        } else {
            return $this->response->setStatusCode(500)->setBody('Failed to update rating');
        }
    }
}
