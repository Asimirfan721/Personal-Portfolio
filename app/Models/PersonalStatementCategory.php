<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalStatementCategory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'content'];

    public function category()
    {
        return $this->belongsTo(PersonalStatementCategory::class, 'category_id');
    }
}
