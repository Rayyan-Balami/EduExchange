<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'user_id',
        'requested',
        'title',
        'subject',
        'description',
        'format',
        'education_level',
        'category',
        'semester',
        'class_faculty',
        'author',
        'image_src',
        'file_src',
    ];
}
