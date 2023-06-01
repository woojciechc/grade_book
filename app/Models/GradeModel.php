<?php
namespace App\Models;

use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'value_id', 'description', 'teacher_id', 'subject_id'];

    public function getGradesForUserFromSubject($userId, $subjectId)
    {
        return $this->select(
            'grade_values.grade_value,
            grade_values.color,
            grades.description'
        )
            ->join('grade_values', 'grades.value_id = grade_values.id')
            ->join('students_classes', 'grades.student_id = students_classes.id')
            ->where('subject_id', $subjectId)
            ->where('students_classes.student_id', $userId)
            ->findAll();
    }
}
?>