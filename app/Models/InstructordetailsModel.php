<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructordetailsModel extends Model
{
    use HasFactory;

    protected $table = 'instructorregistration';

    protected $fillable = [
        "user_id",
        "desig",
        "working",
        "last_qualified",
        "spec",
        "exp",
        "certificate",
        "status"
        
    ];
}
