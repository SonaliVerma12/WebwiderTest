<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class PostController extends BaseController
{
    public function index()
    {
        return view('posts/index');
    }

    public function loadMore()
    {
        $page = $this->request->getGet('page') ?? 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $postModel = new PostModel();
        $posts = $postModel->getActivePostsWithUser($limit, $offset);

        return $this->response->setJSON($posts);
    }
}
