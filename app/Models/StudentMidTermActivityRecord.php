<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMidTermActivityRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'mid_term_activity_id','student_id','score'
    ];
    
    public function getUser()
    {
        return $this->belongsTo(User::class,'student_id');
    }
    
    public function getMidTermActivity()
    {
        return $this->belongsTo(MidTermActivity::class,'mid_term_activity_id');
    }
}
