<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PermanentAddress extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'permanent_addresses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'address_line_one',
        'address_line_two',
        'landmark',
        'city',
        'state',
        'country',
        'pincode',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function loanApplications()
    {
        return $this->belongsTo(LoanApplications::class, 'loan_application_id');
    }
}
