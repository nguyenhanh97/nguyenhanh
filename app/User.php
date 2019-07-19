<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $timestamps =false;
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getindex(){
       return $this->paginate(10);
    }
    public function add($item){
        return $this->insert($item);
    }
    public function getuser($id){
        return $this->findOrFail($id);
    }
    public  function edit($id,$item){
        return $this->where('id',$id)->update($item);
    }
    public function del($id){
        return $this->where('id',$id)->delete();
    }
}
