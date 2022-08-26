<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    use HasFactory;

    protected $table = 'parent_categories';
    protected $fillable = ['category_title_id', 'parent_category_name', 'slug', 'created_by', 'updated_by'];

}
