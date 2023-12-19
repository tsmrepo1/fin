<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "purchase_by",
        "course_id",
        "order_id",
        "payment_id",
        "payment_status"
    ];
}
