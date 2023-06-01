<?php namespace App\Controllers;
 
use App\Models\SubjectModel;
use CodeIgniter\Controller;
 
class StudentController extends Controller {
    public function subjects() {
        $session = session();
        if($session->get('roleId') == 3){
            $model = new SubjectModel();
            $data['subjects'] = $model->getSubjectList();
            $data['title'] = 'List przedmiotów';
            return view('student/subjects', $data);
        }
        else{
            return view('errors/html/error_403');
        }

    }
}