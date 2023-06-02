<?php namespace App\Controllers;
 
use App\Models\ClassModel;
use App\Models\GradeModel;
use App\Models\UserModel;
use App\Models\SubjectModel;
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

    public function gradesForStudents() {
        helper(['form']);
        $session = session();
        $studentId = $this->request->getVar('studentId');
        if($session->get('roleId') == 2){

            $gradeModel = new GradeModel();
            $subjectModel = new SubjectModel();
            $userModel = new UserModel();

            $studentData = $userModel->getUserData($studentId);

            $subjectId = $subjectModel->getSubjectIdForTeacher($session->get('user_id'))['id'];

            $data['title'] = "Oceny " . $studentData['firstName'] . ' ' . $studentData['lastName'];
            $data['studentId'] = $studentId;
            $data['grades'] = $gradeModel->getGradesForUserFromSubject($studentId, $subjectId);
            return view('teacher/studentGrades', $data);
        }
        else{
            return view('errors/html/error_403');
        }
    }


}