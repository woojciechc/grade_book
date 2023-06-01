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
}
?>