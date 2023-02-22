<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Accounts extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'accounts';

    protected $fillable = [
        'firstName',
        'lastName',
        'emailAddress',
        'phoneNumber',
        'password',
        'option'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $guarded = ['id'];
    public function posts()
    {
        return $this->hasOne('App\Models\PostNews','employee_id');
    }
    public function username()
    {
        return 'emailAddress';
    }
}
