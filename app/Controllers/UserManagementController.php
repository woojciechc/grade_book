<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class UserManagementController extends Controller {
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        return view('registration', $data);
    }

    public function register()
    {
        helper(['form']);
        return view('registration');
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
            'firstName'     => 'required|min_length[3]|max_length[20]',
            'lastName'      => 'required|min_length[3]|max_length[20]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'role'          => 'required',
            'confpassword'  => 'matches[password]'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'email'    => $this->request->getVar('email'),
                'firstName'=> $this->request->getVar('firstName'),
                'lastName' => $this->request->getVar('lastName'),
                'role_id'  => $this->request->getVar('role'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            return view('registration', $data);
        }
         
    }
 
    public function login()
    {
        helper(['form']);
        return view('login');
    } 
 
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $hash = substr( $pass, 0, 60 );
            $verify_pass = password_verify($password, $hash);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_email'    => $data['email'],
                    'logged_in'     => TRUE,
                    'roleId'        => $data['role_id']
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function dashboard()
    {
        $session = session();
        echo "Welcome back, ".$session->get('user_email');
    }

}

?>