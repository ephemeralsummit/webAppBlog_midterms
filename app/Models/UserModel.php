<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'User';
    protected $primaryKey = 'UserID';

    protected $allowedFields = [
        'Username',
        'Email',
        'Password',
        'Bio',
        'ProfilePicture'
    ];

    protected $returnType = 'array';

    public function getByEmail($email)
    {
        return $this->where('Email', $email)->first();
    }
}
