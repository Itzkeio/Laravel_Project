<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $table = 'enrollments';
    protected $primaryKey = 'enrollment_id'; 
    protected $fillable = ['student_id', 'course_id', 'enrollment_date'];
    public function student()
{
    return $this->belongsTo(Student::class);
}
}
