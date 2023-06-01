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
        return $this->join('user', 'subjects.teacher_id = user.id')->findAll();
    }
}
?>