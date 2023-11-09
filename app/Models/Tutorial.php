<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;
    protected $table = "tutorials";
    protected $primaryKey = "id";
    protected $fillable = ['Name', 'Description', 'TeacherID','Img'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'TeacherID');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseID');
    }
}
