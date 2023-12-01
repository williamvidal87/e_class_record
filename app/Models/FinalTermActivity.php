<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalTermActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_category_id','activity_name','date','maximum_score'
    ];
}
