<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriesSeeder extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name','created_at', 'updated_at',];

}
