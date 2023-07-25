<?php

namespace Hamiddj\SmartTicket;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Eloquent
{
    use SoftDeletes;
     
    protected $fillable = ['ticket_id','text','sender'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

}