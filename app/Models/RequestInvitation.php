<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInvitation extends Model
{
    use HasFactory;

    protected $table = 'request_invitations';
    protected  $guarded = [];

    public function userSendInvitation()
    {
        return $this->hasOne(User::class,'id', 'sent_invitation',);
    }
    public function userReceievedInvitation()
    {
        return $this->hasOne(User::class,'id','received_invitation');
    }
}
