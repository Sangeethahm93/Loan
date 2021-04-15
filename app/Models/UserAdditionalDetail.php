<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class UserAdditionalDetail extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'users_additional_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'no_of_houses',
        'lands',
        'no_of_vehicles',
        'other_property',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getAdditionalUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
