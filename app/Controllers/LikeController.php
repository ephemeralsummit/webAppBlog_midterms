<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\LikeModel;
class LikeController extends BaseController
{
    use ResponseTrait;
    public function toggle($postId)
    {
        $likeModel = new LikeModel();

        $userId = session()->get('user_id');
        if (!$userId){
            return $this->failUnauthorized('You must be logged in to like a post.');
        }
        //cek like
        $existingLike = $likeModel->where(['user_id' => $userId, 'post_id' => $postId])->first();

        if ($existingLike) {
            $likeModel->delete($existingLike['id']);
            $status = 'unliked';
        } else {
            $likeModel->insert(['user_id' => $userId, 'post_id' => $postId]);
            $status = 'liked';
        }

        $totalLikes = $likeModel->where('post_id', $postId)->countAllResults();

        return $this->respond([
            'status'      => 'success',
            'action'      => $status,
            'total_likes' => $totalLikes
        ]);
    }
}

