<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'review_id'; 
    protected $fillable = ['course_id', 'student_id', 'rating', 'review_text'];
    public function course()
{
    return $this->belongsTo(Course::class);
}
public function student()
{
    return $this->belongsTo(Student::class);
}
}
