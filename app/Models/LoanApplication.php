<?php

namespace App\Models;

use App\Observers\LoanApplicationObserver;
use App\Traits\MultiTenantModelTrait;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class LoanApplication extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'loan_applications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'loan_amount',
        'loan_purpose',
        'loan_tenure',
        'description',
        'status_id',
        'analyst1_id',
        'analyst2_id',
        'created_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function booted()
    {
        self::observe(LoanApplicationObserver::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function analystOne()
    {
        return $this->belongsTo(User::class, 'analyst1_id');
    }

    public function analystTwo()
    {
        return $this->belongsTo(User::class, 'analyst2_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
