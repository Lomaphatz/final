<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;

class TaRequest extends Model
{
    use HasFactory;
    protected $table = 'requests';
    protected $primaryKey = 'request_id';
    protected $fillable = [
        'request_id',
        'detail',
        'user_id',
        'course_id'
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
