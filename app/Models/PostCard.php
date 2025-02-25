<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCard extends Model
{
    protected $fillable = [
        'recipient_name',
        'address1',
        'address2',
        'city',
        'state',
        'postal_code',
        'message',
        'image'
    ];
}
