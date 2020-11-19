<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\Traits\UsesUuid;


class User extends Authenticatable
{
    use Notifiable, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
            $model->id = $model->getIdUser();
        });
    }
    protected function getIdUser()
    {
        $getIdUser = Role::where('role_name', 'user')->first();
        return $getIdUser->id;
    }

    public function getIdAdmin()
    {
        $getIdAdmin = Role::where('role_name', 'admin')->first();
        return $getIdAdmin->id;
    }

    public function checkAdmin()
    {
        if ($this->role_id == $this->getIdAdmin()) {
            return true;
        } else {
            echo $this->role_id;
            echo " +  " . $this->getIdAdmin();
            return false;
        }
    }


    public function getIncrementing()
    {
        return false;
    }


    protected $fillable = [
        'name', 'email', 'password', 'role_id',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
