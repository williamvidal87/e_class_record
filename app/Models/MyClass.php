<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'semester_id','school_year','subject_id','section','schedule','instructor_id'
    ];
    
    public function getSemester()
    {
        return $this->belongsTo(Semester::class,'semester_id');
    }
    
    public function getSubject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
    
    public function getUser()
    {
        return $this->belongsTo(User::class,'instructor_id');
    }
}
