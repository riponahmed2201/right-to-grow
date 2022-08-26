<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTitle extends Model
{
    use HasFactory;

    protected $table = 'category_titles';
    protected $fillable = ['category_type_id', 'category_title', 'slug', 'description', 'created_by', 'updated_by'];
}
