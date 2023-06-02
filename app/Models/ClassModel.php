<?php 
namespace App\Models;
use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];

    public function getClassList()
    {
        return $this->findAll();
    }

    public function getClassNameById($classId)
    {
        return $this
        ->select('name')
        ->where('id', $classId)
        ->first();
    }

    public function getClassesForTeacher($teacherId) 
    {
        return $this->select('classes.id, classes.name')
        ->join('teachers_classes', 'classes.id = teachers_classes.class_id')
        ->where('teachers_classes.teacher_id', $teacherId)
        ->findAll();
    }
}
?>