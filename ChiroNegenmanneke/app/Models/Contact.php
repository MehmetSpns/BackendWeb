<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Velden die massaal toewijsbaar zijn
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
