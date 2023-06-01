<?php namespace App\Controllers;
 
use App\Models\GradeModel;
use App\Models\SubjectModel;
use CodeIgniter\Controller;
 
class GradesController extends Controller {
    public function grades() {
        $session = session();
        $subjectId = $this->request->getVar('subjectId');
        if($session->get('roleId') == 3){
            $model = new GradeModel();
            $subjectModel = new SubjectModel();
            $data['subject'] = $subjectModel->getSubjectName($subjectId);
            $data['grades'] = $model->getGradesForUserFromSubject($session->get('user_id'), $subjectId);
            return view('student/grades', $data);
        }
        else{
            return view('errors/html/error_403');
        }

    }
}