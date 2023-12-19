<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forummessage extends Model
{
    use HasFactory;

    protected $table = 'forummessages';

    protected $fillable = [
        "forum_id",
        "fr_id",
        "to_id",
        "message",
        "stat",
        
    ];
}
