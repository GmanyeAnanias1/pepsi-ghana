<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'status',
        'cover_letter',
        'resume_path',
        'interview_date',
        'interview_notes',
        'rejection_reason',
    ];

    protected $casts = [
        'interview_date' => 'datetime',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
