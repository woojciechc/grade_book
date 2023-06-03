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

    public function changePassword()
    {
        $session = session();
        if ($session->get('roleId') == 1) {
            helper(['form']);
            $model = new UserModel();

            $data['userData'] = $model->getUserData($this->request->getVar('userId'));
            $data['title'] = 'Zmień hasło dla uzytkownika: ' . $data['userData']['firstName'] . ' ' . $data['userData']['lastName'];

            return view('admin/changePassword', $data);
        } else {
            return view('errors/html/error_403');
        }
    }

    public function postChangePassword()
    {
        $session = session();
        if ($session->get('roleId') == 1) {
            helper(['form']);
            $model = new UserModel();

            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
            $model->changePassword($this->request->getVar('userId'), $password);

            return redirect()->to('/admin/dashboard');
        } else {
            return view('errors/html/error_403');
        }
    }
}