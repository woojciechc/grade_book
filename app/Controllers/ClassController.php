<?php namespace App\Controllers;
 
use App\Models\UserModel;
use App\Models\ClassModel;
use CodeIgniter\Controller;
 
class ClassController extends Controller {
    public function index() {
        $session = session();
        $classId = $this->request->getVar('classId');
        if($session->get('roleId') == 2){
            $model = new UserModel();
            $classModel = new ClassModel();
            $data['title'] = "Klasa " . $classModel->getClassNameById($classId)['name'];
            $data['classes'] = $model->getStudentsForClass($classId);
            return view('class/index', $data);
        }
        else{
            return view('errors/html/error_403');
        }

    }
}