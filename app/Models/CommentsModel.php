<?php
namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model {
    protected $table = 'comments';
    protected $allowedFields = [
        'user_id',
        'post_id',
        'comment',
        'created_at'
    ];
}
?>