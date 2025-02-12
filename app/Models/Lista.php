<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lista extends Model
{
    use HasFactory;
    protected $table = 'lista';
    protected $fillable = 
    [
        'product_name'
    ];
}
