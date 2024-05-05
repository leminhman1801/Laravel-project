<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete
class Products extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products'; 
    protected $dates = ['deleted_at'];
  
    protected $fillable = ['ID', 'name', 'description', 'price' ,'deleted_at']; 
    protected $guarded = []; 
    
}
