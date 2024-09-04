<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseraFile extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'file_path', 'description'];
}

