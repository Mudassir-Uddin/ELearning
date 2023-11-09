<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = "courses";
    protected $primaryKey = "id";
    protected $fillable = ['Name', 'Img'];

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }

    public function tutorial()
    {
        return $this->hasMany(Tutorial::class);
    }
}
