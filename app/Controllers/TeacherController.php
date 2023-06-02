<?php namespace App\Controllers;
 
use App\Models\ClassModel;
use CodeIgniter\Controller;
 
class TeacherController extends Controller {
    public function classes() {
        $session = session();
        if($session->get('roleId') == 2){
            $model = new ClassModel();
            $teacher_id = $session->get('user_id');
            $data['classes'] = $model->getClassesForTeacher($teacher_id);
            $data['title'] = 'Moje klasy';
            return view('teacher/classes', $data);
        }
        else{
            return view('errors/html/error_403');
        }

    }
}