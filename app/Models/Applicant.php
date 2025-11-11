<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_id',
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone',
        'city',
        'country',
        'cv_path',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id');
    }
}