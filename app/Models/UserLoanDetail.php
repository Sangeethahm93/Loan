<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class UserLoanDetail extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'users_loan_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'existing_loan_bank',
        'existing_loan_type',
        'existing_loan_amount',
        'existing_loan_emi',
        'existing_loan_tenure',
        'existing_loan_start_date',
        'existing_loan_account_number',
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
}
