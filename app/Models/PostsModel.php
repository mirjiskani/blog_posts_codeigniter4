<?php
namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model {
    protected $table = 'posts';
    protected $allowedFields = [
        'user_id',
        'post_title',
        'postContent',
        'status',
        'created_at'
    ];
}
?>