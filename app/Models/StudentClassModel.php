<?php 
namespace App\Models;
use CodeIgniter\Model;

class StudentClassModel extends Model
{
    protected $table = 'students_classes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'class_id'];

    public function addUserToClass($data)
    {
        return $this->insert($data);
    }

    public function removeUserFromClass($id)
    {
        return $this->delete($id);
    }
}
?>