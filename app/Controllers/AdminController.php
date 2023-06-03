<?php namespace App\Controllers;
 
use App\Models\UserModel;
use CodeIgniter\Controller;
 
class AdminController extends Controller {
    public function dashboard() {
        $session = session();
        if($session->get('roleId') == 1){
            $model = new UserModel();
            $data['title'] = "Admin - Uzytkownicy ";
            $data['users'] = $model->getUserList();
            return view('admin/dashboard', $data);
        }
        else{
            return view('errors/html/error_403');
        }

    }

    public function removeUser()
    {
        $session = session();
        if ($session->get('roleId') == 1) {
            $model = new UserModel();

            $model->removeUser($this->request->getVar('userId'));

            return redirect()->to('/admin/dashboard');
        } else {
            return view('errors/html/error_403');
        }
    }
}