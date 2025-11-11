<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'description',
        'salary_range',
        'level',
        'type',
        'role',
        'posted_at',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
    ];

    // Define the relationship to applicants
    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'work_id');
    }
}