<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputationGrade extends Model
{
    use HasFactory;

    protected $fillable = ['computation_name','multiply','addition'];
    
}
