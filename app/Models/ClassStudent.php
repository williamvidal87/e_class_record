<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'my_class_id','student_id'
    ];
    
    public function getMyClass()
    {
        return $this->belongsTo(MyClass::class,'my_class_id')->with('getUser');
    }
    
    public function getStudent()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}
