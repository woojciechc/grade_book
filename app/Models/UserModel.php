<?php 
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email','firstName','lastName','password', "role_id"];

    public function getUserList()
    {
        return $this->select('user.id, email, lastName, firstName, role_id, roles.role_name as role_name')
        ->join('roles', 'roles.id = user.role_id')->findAll();
    }

    public function getStudentsForClass($classId) 
    {
        return $this->select('user.id as id, lastName, firstName')
        ->join('students_classes', 'students_classes.student_id = user.id')
        ->where('students_classes.class_id', $classId)
        ->findAll();
    }

    public function getUserData($userId) 
    {
        return $this->select('user.id, email, lastName, firstName, role_id, roles.role_name as role_name')
        ->join('roles', 'roles.id = user.role_id')
        ->where('user.id', $userId)
        ->first();
    }

    public function removeUser($id) {
        $this->delete($id);
    }

    public function changePassword($userId, $password) {
        $this->set('password', $password)
        ->where('id', $userId)
        ->update();
    }

    public function changeUserData($firstName, $lastName, $email, $roleId, $userId) {
        $this->set('firstName', $firstName)
        ->set('lastName', $lastName)
        ->set('email', $email)
        ->set('role_id', $roleId)
        ->where('id', $userId)
        ->update();
    }
    
}
?>