<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model as Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'logo',
        'address',
        'website'
    ];

    /**
     * Get employees.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
