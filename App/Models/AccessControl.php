<?php

namespace App\Models;

use Core\Session;
use Illuminate\Database\Eloquent\Model;

class AccessControl extends Model
{
    public $timestamps = false;
    protected $table = 'access_controls'; 
    protected $primaryKey = 'id';
    public static function checkAccess($allowedRoles)
    {
        $session = new Session();

        if (!$session->isSignedIn()) {
   
            return header("Location: 'index.php'");
        }

        $userRole = $session->role;

        if (!in_array($userRole, $allowedRoles)) {
    
            return header("Location: 'index.php'");
        }
    }
}
