<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class PostController extends BaseController
{
    // GET /posts
    public function index()
    {
        $postModel = new PostModel();
        $userModel = new UserModel();

        // Get filter/search from query parameters
        $search = $this->request->getGet('search');
        $userID = $this->request->getGet('user');

        // Base query
        $builder = $postModel->select('Post.*, User.Username')
                            ->join('User', 'User.UserID = Post.UserID', 'left');

        // Search by title
        if (!empty($search)) {
            $builder->like('Post.Title', $search);
        }

        // Filter by user
        if (!empty($userID)) {
            $builder->where('Post.UserID', $userID);
        }

        $posts = $builder->orderBy('Post.PublicationDate', 'DESC')->findAll();

        // Fetch all users for the dropdown filter
        $users = $userModel->select('UserID, Username')->findAll();

        return view('posts/index', [
            'posts' => $posts,
            'search' => $search,
            'userID' => $userID,
            'users' => $users
        ]);
    }



    // GET /posts/create
    public function create()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('posts/create', ['users' => $users]);
    }

    // POST /posts/store
    public function store()
    {
        $postModel = new PostModel();
        $userModel = new UserModel();
        helper(['form']);


        // Validation passed: insert post
        $data = [
            'Title'           => $this->request->getPost('Title'),
            'Content'         => $this->request->getPost('Content'),
            'Category'        => $this->request->getPost('Category'),
            'PublicationDate' => date('Y-m-d H:i:s'),
            'Tags'            => $this->request->getPost('Tags'),
            'UserID' => session()->get('UserID'),
        ];

        $postModel->insert($data);

        return redirect()->to('/posts')->with('message', 'Post created successfully!');
    }


    // GET /posts/edit/{id}
    public function edit($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);

        if (!$post) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Post not found');
        }

        // Ensure only the author can edit
        if ($post['UserID'] != session()->get('UserID')) {
            return redirect()->to('/posts')->with('error', 'You are not allowed to edit this post.');
        }

        $userModel = new UserModel();

        return view('posts/edit', [
            'post' => $post,
            'users' => $userModel->findAll(),
        ]);
    }

    // POST /posts/update/{id}
    public function update($id)
    {
        $postModel = new PostModel();
        helper('form');


        $data = [
            'Title' => $this->request->getPost('Title'),
            'Content' => $this->request->getPost('Content'),
            'Category' => $this->request->getPost('Category'),
            'Tags' => $this->request->getPost('Tags'),
            'UserID' => session()->get('UserID'),
        ];

        $postModel->update($id, $data);
        return redirect()->to('/posts')->with('message', 'Post updated successfully!');
    }

    // GET /posts/delete/{id}
    public function delete($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);

        if (!$post) {
            return redirect()->to('/posts')->with('error', 'Post not found.');
        }

        // Only author can delete
        if ($post['UserID'] != session()->get('UserID')) {
            return redirect()->to('/posts')->with('error', 'You are not allowed to delete this post.');
        }

        $postModel->delete($id);
        return redirect()->to('/posts')->with('message', 'Post deleted successfully!');
    }

    // GET /posts/view/{id}
    public function view($id)
    {
        $postModel = new PostModel();
        $userModel = new UserModel();

        $post = $postModel
            ->select('Post.*, User.Username')
            ->join('User', 'User.UserID = Post.UserID', 'left')
            ->where('Post.PostID', $id)
            ->first();

        if (!$post) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Post not found");
        }

        return view('posts/view', [
            'post' => $post
        ]);
    }

}
