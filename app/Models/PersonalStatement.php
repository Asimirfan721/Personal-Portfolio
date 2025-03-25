<?php

// app/Models/PersonalStatement.php

// app/Models/PersonalStatement.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalStatement extends Model
{
    use HasFactory;  
    //this is for factory/

    protected $fillable = ['user_id', 'category_id', 'content', 'email'];

    public function category()
    {
        return $this->belongsTo(PersonalStatementCategory::class, 'category_id');
    }
}

