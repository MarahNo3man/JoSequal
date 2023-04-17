<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'company_id',
        'firstName',
        'lastName',
        'email',
        'phone',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
