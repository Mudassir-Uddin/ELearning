<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'Img', 'CourseID'];

    public function cours()
    {
        return $this->belongsTo(Course::class, 'CourseID', 'id'); 
    }

    public function tutorial()
    {
        return $this->hasMany(Tutorial::class);
    }
}
