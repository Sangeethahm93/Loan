<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;


class UserPersonalDetail extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'users_personal_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'applicant_name',
        'father_or_husband_name',
        'date_of_birth',
        'gender',
        'married_status',
        'religion',
        'mobile_no',
        'pan_no',
        'adhar_no',
        'education_type',
        'pre_address_line_one',
        'pre_address_line_two',
        'pre_landmark',
        'pre_country',
        'pre_state',
        'pre_city',
        'pre_zipcode',
        'per_address_line_one',
        'per_address_line_two',
        'per_landmark',
        'per_country',
        'per_state',
        'per_city',
        'per_zipcode',
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

    public function educationType() 
    {
        return $this->belongsTo(EducationType::class);
    }

    public function preCountry() 
    {
        return $this->belongsTo(Country::class, 'pre_country');
    }

    public function perCountry() 
    {
        return $this->belongsTo(Country::class, 'per_country');
    }

    public function preState() 
    {
        return $this->belongsTo(State::class, 'pre_state');
    }

    public function perState() 
    {
        return $this->belongsTo(State::class, 'per_state');
    }

    public function preCity() 
    {
        return $this->belongsTo(City::class, 'pre_city');
    }

    public function perCity() 
    {
        return $this->belongsTo(City::class, 'per_city');
    }
}
