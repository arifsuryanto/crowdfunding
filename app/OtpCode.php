<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use Illuminate\Support\Str;


class OtpCode extends Model
{
    use UsesUuid;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'valid_until', 'user_id'
    ];

    /**
     * The "booting" function of model
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
    protected $table = 'otp_codes';

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
}
