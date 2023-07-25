<?php

namespace Hamiddj\SmartTicket;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Eloquent
{
    use SoftDeletes;
     
    protected $fillable = ['user_id','title','importance','status'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}