<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;
use App\Models\BiodataModel;

class BiodataController extends BaseController
{
    public function saveChanges()
    {
        $userid = $this->request->getCookie('userid');

        $username = $this->request->getPost('username');
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $email = $this->request->getPost('email');
        $age = $this->request->getPost('age');
        $phonenumber = $this->request->getPost('phonenumber');
        $jobs = $this->request->getPost('jobs');
        $bio = $this->request->getPost('bio');
        $location = $this->request->getPost('location');
        $language = $this->request->getPost('language');
        $instagram = $this->request->getPost('instagram');
        $tiktok = $this->request->getPost('tiktok');

        $userModel = new UserModel();
        $user = $userModel->where('user_id', $userid)->first();

        $biodataID = $user['Biodata_ID'];

        $biodataModel = new BiodataModel();
        $biodataData = [
            'First_name' => $firstname,
            'Last_name' => $lastname,
            'Age' => $age,
            'Email' => $email,
            'Phone_number' => $phonenumber,
            'Jobs' => $jobs,
            'Description' => $bio,
            'Location' => $location,
            'Language' => $language,
            'Instagram_account' => $instagram,
            'Tiktok_account' => $tiktok
        ];
        
        $biodataModel->update($biodataID, $biodataData);

        $message = 'Perubahan data berhasil disimpan!';

        $biodataData = $biodataModel
        ->join('Users', 'Users.Biodata_ID = Biodata.Biodata_ID')
        ->where('Users.User_ID', $userid)
        ->first();

        session()->setFlashdata('message', $message);

        return redirect()->to("/profile/edit/{$userid}")->with('biodata', $biodataData);
    }

    public function profile($userid){
        if($userid != $this->request->getCookie('userid')){
            return redirect()->to('/menu');
        }
        $userModel = new UserModel();
        $userData = $userModel->where('user_id', $userid)->first();

        $biodataID = $userData['Biodata_ID'];
        $biodataModel = new BiodataModel();

        $biodataData = $biodataModel
        ->join('Users', 'Users.Biodata_ID = Biodata.Biodata_ID')
        ->where('Users.User_ID', $userid)
        ->first();

        return view('profile_edit', ['biodata' => $biodataData]);
    }

    
    public function profileview($userid){
        $userModel = new UserModel();
        $userData = $userModel->where('user_id', $userid)->first();

        $biodataID = $userData['Biodata_ID'];
        $biodataModel = new BiodataModel();

        $biodataData = $biodataModel
        ->join('Users', 'Users.Biodata_ID = Biodata.Biodata_ID')
        ->where('Users.User_ID', $userid)
        ->first();

        return view('profile_view', ['biodata' => $biodataData]);
    }

    public function deleteUser($userid){
        if($userid != $this->request->getCookie('userid')){
            return redirect()->to('/menu');
        }

        $userModel = new UserModel();
        $biodataModel = new BiodataModel();

        $user = $userModel->find($userid);

        $biodataID = $user['Biodata_ID'];

        $userModel->delete($userid);
        $biodataModel->delete($biodataID);

        return redirect()->to('/logout');
    }
}
