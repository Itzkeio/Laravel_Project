<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'course_id'; 
    protected $fillable = ['title', 'description', 'price', 'instructor_id', 'category_id'];
    public function category()
{
    return $this->belongsTo(Category::class); 
}
public function instructor()
{
    return $this->belongsTo(Instructor::class); 
}
public function enrollments() 
{
    return $this->hasMany(Enrollment::class);
}
public function reviews()
{
    return $this->hasMany(Review::class);
}
}
