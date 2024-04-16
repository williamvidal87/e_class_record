<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinalActivityCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'my_class_id','activity_category','percentage','multiply','addition'
    ];
    
}
