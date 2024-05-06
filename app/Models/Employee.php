<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model as Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone'
    ];

    /**
     * Get company.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
