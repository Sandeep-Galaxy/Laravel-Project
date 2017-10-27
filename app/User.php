<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['usertype_id'];

    /**
     * Get all of the tasks for the user.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get all of the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function isAdmin()
    {
        return ($this->usertype_id === 1); // this looks for an admin column in your users table
    }

    public function isUser()
    {
        return ($this->usertype_id === 2); // this looks for an user column in your users table
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomNotification($token));
    }

    
}
