<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;


class UserOccupationDetail extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'users_occupation_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'occupation',
        'salried_occupation_company_type',
        'salried_occupation_industry_type',
        'self_employeed_company_type',
        'self_employeed_business',
        'self_employeed_professional',
        'other_occupation',
        'designation',
        'current_job_experience',
        'total_experience',
        'company_name',
        'address_line_one',
        'address_line_two',
        'country',
        'state',
        'city',
        'zipcode',
        'tel_no',
        'company_email',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCountry() 
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function getState() 
    {
        return $this->belongsTo(State::class, 'state');
    }

    public function getCity() 
    {
        return $this->belongsTo(City::class, 'city');
    }
    
}
