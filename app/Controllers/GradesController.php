<?php

namespace App\Controllers;

use App\Models\GradeModel;
use App\Models\SubjectModel;
use CodeIgniter\Controller;

class GradesController extends Controller
{
    public function grades()
    {
        $session = session();
        $subjectId = $this->request->getVar('subjectId');
        if ($session->get('roleId') == 3) {
            $model = new GradeModel();
            $subjectModel = new SubjectModel();
            $data['title'] = "Oceny " . $subjectModel->getSubjectName($subjectId)['name'];
            $data['grades'] = $model->getGradesForUserFromSubject($session->get('user_id'), $subjectId);
            return view('student/grades', $data);
        } else {
            return view('errors/html/error_403');
        }
    }
    public function addGrade()
    {
        $session = session();
        if ($session->get('roleId') == 2) {
            $subjectModel = new SubjectModel();
            $data['subject_id'] = $subjectModel->getSubjectIdForTeacher($session->get('user_id'))['id'];;
            $data['student_id'] = $this->request->getVar('studentId');
            $data['value_id'] = $this->request->getVar('grade');
            $data['description'] = $this->request->getVar('description');
            $data['teacher_id'] = $session->get('user_id');

            $model = new GradeModel();
            $model->addGrade($data);

            return redirect()->to('/teacher/gradesForStudents?studentId=' . $data['student_id']);
        } else {
            return view('errors/html/error_403');
        }
    }

    public function removeGrade()
    {
        $session = session();
        if ($session->get('roleId') == 2) {
            $subjectModel = new SubjectModel();
            $data['student_id'] = $this->request->getVar('studentId');
            $id= $this->request->getVar('gradeId');

            $model = new GradeModel();
            $model->removeGrade($id);

            return redirect()->to('/teacher/gradesForStudents?studentId=' . $data['student_id']);
        } else {
            return view('errors/html/error_403');
        }
    }
}
