<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'member';
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_name',
        'user_email',
        'user_password',
        'user_verify',
        'user_cv',
        'user_code',
        'user_reffer',
        'user_point'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password'
    ];

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    public function articles(){
        return $this->hasMany(Article::class, 'user_id', 'user_id');
    }

    public function point_history(){
        return $this->hasMany(PointHistory::class, 'user_id', 'user_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'user_id', 'user_id');
    }

    public function reward_history(){
        return $this->hasMany(RewardHistory::class, 'user_id', 'user_id');
    }
}
