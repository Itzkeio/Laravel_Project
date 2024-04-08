<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'student_id'; 
    protected $fillable = ['first_name', 'last_name', 'email'];

public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}
public function reviews()
{
    return $this->hasMany(Review::class);
}
}
