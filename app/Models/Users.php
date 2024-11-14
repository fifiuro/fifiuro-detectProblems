<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'last_name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     * 
     * @var arrat=<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast
     * 
     * @var array<strin, string>
     */
    protected $cast = [
    ];
}
