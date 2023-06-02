<?php
namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'teacher_id'];

    public function getSubjectList()
    {
        return $this->select('subjects.id as id, user.id as userId, subjects.name, user.firstName, user.lastName')
        ->join('user', 'subjects.teacher_id = user.id')
        ->findAll();
    }

    public function getSubjectName($subjectId)
    {
        return $this->select('subjects.name')
        ->where('id', $subjectId)
        ->first();
    }

    public function getSubjectIdForTeacher($teacherId)
    {
        return $this->select('subjects.id')
        ->where('teacher_id', $teacherId)
        ->first();
    }
}
?>