<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Users extends Model
{
    public $timestamps = false;
    protected $table = "login";

    protected $fillable = [
        'userid',
        'usname', 'pass', 'role'
    ];

    /**
     * Verify user by username and password.
     *
     * @param string $username
     * @param string $password
     * @return Users|null
     */
    public static function verifyUser($username, $password)
    {
        return self::where('usname', $username)
            ->where('pass', $password)
            ->first(); 
    }
}
