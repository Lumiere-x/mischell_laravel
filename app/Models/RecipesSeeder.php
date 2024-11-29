<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipesSeeder extends Model
{
     use HasFactory;
     protected $table = 'recipes';
     protected $fillable = ['title', 'ingredients', 'instructions', 'category_id', 'created_at', 'updated_at'];
     
}
