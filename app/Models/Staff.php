<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'staff';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'staffType',
        'fname',
        'lname',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    
    public static function check_authority($levels) 
    {
        $response=NULL;
        $user_auth=Auth::user(); 
        
        if(!in_array($user_auth->staffType,$levels)){ 
            return false; //user not authorized
        }
        else{
         return true; //user authorized so go ahead with query
        }
          
    }


}
