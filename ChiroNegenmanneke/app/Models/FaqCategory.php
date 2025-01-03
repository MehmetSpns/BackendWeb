<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany(FaqQuestion::class, 'category_id'); 
    }
}
