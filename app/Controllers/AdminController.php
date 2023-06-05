<?php
namespace App\Controllers;

use App\Models\ClassModel;
use App\Models\StudentClassModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $session = session();
        if ($session->get('roleId') == 1) {
            $model = new UserModel();
            $data['title'] = "Admin - Uzytkownicy ";
            $data['users'] = $model->getUserList();
            return view('admin/dashboard', $data);
        } else {
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

    public function changeUserData()
    {
        $session = session();
        if ($session->get('roleId') == 1) {
            helper(['form']);
            $model = new UserModel();

            $data['userData'] = $model->getUserData($this->request->getVar('userId'));
            $data['title'] = 'Zmień dane dla uzytkownika: ' . $data['userData']['firstName'] . ' ' . $data['userData']['lastName'];

            return view('admin/changeUserData', $data);
        } else {
            return view('errors/html/error_403');
        }
    }

    public function postChangeUserData()
    {
        $session = session();
        if ($session->get('roleId') == 1) {
            $model = new UserModel();

            $firstName = $this->request->getVar('firstName');
            $lastName = $this->request->getVar('lastName');
            $email = $this->request->getVar('email');
            $roleId = $this->request->getVar('role');
            $userId = $this->request->getVar('userId');

            $model->changeUserData($firstName, $lastName, $email, $roleId, $userId);

            return redirect()->to('/admin/dashboard');
        } else {
            return view('errors/html/error_403');
        }
    }

    public function postChangePassword()
    {
        $session = session();
        if ($session->get('roleId') == 1) {
            $model = new UserModel();

            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
            $model->changePassword($this->request->getVar('userId'), $password);

            return redirect()->to('/admin/dashboard');
        } else {
            return view('errors/html/error_403');
        }
    }

    public function classes()
    {
        $session = session();
        if ($session->get('roleId') == 1) {
            $classModel = new ClassModel();
            $data['title'] = "Lista klas";
            $data['classes'] = $classModel->getClassList();
            return view('admin/classes', $data);
        } else {
            return view('errors/html/error_403');
        }

    }

    public function class ()
    {
        helper(['form']);
        $session = session();
        $classId = $this->request->getVar('classId');
        if ($session->get('roleId') == 1) {
            $model = new UserModel();
            $classModel = new ClassModel();
            $data['studentsToAdd'] = $model->getStudentsNotInClass($classId);
            $data['title'] = "Klasa " . $classModel->getClassNameById($classId)['name'];
            $data['classes'] = $model->getStudentsForClass($classId);
            $data['classId'] = $classId;
            return view('admin/class', $data);
        } else {
            return view('errors/html/error_403');
        }

    }

    public function addUserToClass()
    {

        $model = new StudentClassModel();
        $data = [
            'student_id' => $this->request->getVar('studentId'),
            'class_id' => $this->request->getVar('classId'),
        ];
        $model->addUserToClass($data);

        return redirect()->to('/admin/class?classId=' . $this->request->getVar('classId'));
    }

    public function removeStudent()
    {

        $model = new StudentClassModel();
        $studentId = $this->request->getVar('entryId');

        $model->removeUserFromClass($studentId);
        return redirect()->to('/admin/class?classId=' . $this->request->getVar('classId'));

    }

}