<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forumhead extends Model
{
    use HasFactory;

    protected $table = 'forums';

    protected $fillable = [
        "course_id",
        "chapter_id",
        "lesson_id",
        "created_by",
        
    ];
}
