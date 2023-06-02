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
        return $this->findAll();
    }

    public function getStudentsForClass($classId) 
    {
        return $this->select('user.id as id, lastName, firstName')
        ->join('students_classes', 'students_classes.student_id = user.id')
        ->where('students_classes.class_id', $classId)
        ->findAll();
    }
}
?>