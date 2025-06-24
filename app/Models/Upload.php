<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    
// this is uploads
    protected $fillable = ['image_path', 'description', 'category'];
 public function category()
{
    return $this->belongsTo(Category::class);
}

}
