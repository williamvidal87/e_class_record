<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'my_class_id','activity_category','percentage','multiply','addition'
    ];
}