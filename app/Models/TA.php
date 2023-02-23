<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;

class TA extends Model
{
    use HasFactory;
    protected $table = 'tas';
    protected $fillable = [
        'ta_id',
        'student_id',
        'name',
        'address',
        'email',
        'users_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course','course_id');
    }
    
}
