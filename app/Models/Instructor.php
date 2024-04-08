<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructors';
    protected $primaryKey = 'instructor_id'; 
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'bio'];
    public function courses()
{
    return $this->hasMany(Course::class); 
}
}
