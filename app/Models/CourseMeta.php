<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        "course_id",
        "things_to_learn",
        "requirements",
        "target_audience"
    ];
}
