<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supportmessagetracker extends Model
{
    use HasFactory;

    protected $table = 'supportmessagetrackers';
    protected $fillable = [
        "ticket_id",
        "f_id",
        "t_id",
        "message",
        
        
    ];

    public function supportTracker()
    {
        return $this->belongsTo(Suporttracker::class, 'ticket_id', 'id');
    }

    
}
