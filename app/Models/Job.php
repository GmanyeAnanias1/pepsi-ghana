<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
// Specify the table name
    protected $table = 'job';

    protected $fillable = [
        'title',
        'description',
        'location',
        'job_type',
        'salary',
        'requirements',
        'responsibilities',
        'is_active',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
