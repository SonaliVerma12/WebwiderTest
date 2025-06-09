<?php
namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'user_id', 'active'];
    protected $useTimestamps = true;

    
    public function scopeActive($builder)
    {
        return $builder->where('posts.active', 1);
    }

    public function getActivePostsWithUser($limit, $offset)
    {
        return $this->select('posts.name, posts.description, users.name as user_name')
                    ->join('users', 'users.id = posts.user_id')
                    ->where('posts.active', 1)
                    ->orderBy('posts.id', 'DESC')
                    ->findAll($limit, $offset);
    }
}
