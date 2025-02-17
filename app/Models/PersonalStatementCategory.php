<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalStatementCategory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name','category_id', 'content', 'email'];
    protected $table = 'personal_statement_categories';
// this is personal statment
    public function category()
    { 
        return $this->belongsTo(PersonalStatementCategory::class, 'category_id');
    }
}
