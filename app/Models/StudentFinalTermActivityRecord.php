<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFinalTermActivityRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'final_activity_id','student_id','score'
    ];
    
    public function getUser()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}
