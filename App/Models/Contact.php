<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    protected $table = 'contact';
    protected $fillable = [
        'id', 'fullname', 'phoneno', 'email', 'cdate', 'approval',
    ];

    public static function getContactsByApproval($approvalStatus)
    {
        return Contact::where('approval', $approvalStatus)->get();
    }
}
