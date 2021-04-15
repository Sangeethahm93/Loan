<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class UserIncomeBankDetail extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'users_income_bank_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'monthly_salary',
        'annual_turnover',
        'net_profit',
        'other_income',
        'other_income_source_rental',
        'other_income_source_agricultural',
        'other_income_source_other',
        'account_number',
        'bank_name',
        'branch',
        'customer_id',
        'account_type',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getIncomeUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
