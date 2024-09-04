<?php

// app/Models/StatementOfPurpose.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatementOfPurpose extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content'];

    protected $table = 'statements_of_purpose'; // Explicitly define the table name

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}