<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MidTermActivity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'activity_category_id','activity_name','date','maximum_score'
    ];
}
