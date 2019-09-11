<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    Protected $table ='user_message';

    protected $fillable = [
        'sender_id',
        'message',
        'reciver_id'
    ];

    protected $hidden=[
        'id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
