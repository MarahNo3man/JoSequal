<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }


    public function getLogoAttribute($value)
    {
        if (isset($value)) {
            return asset($value);
        } else {
            return asset('backend\assets\images\no_image.jpg');
        }
    }
}
