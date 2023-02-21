<?php
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {
    protected $table = 'users';
    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'password',
        'created_at'
    ];
}
?>