<?php

namespace CubeAgency\NovaGoogle2fa\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User2fa extends Model
{
    protected $table = 'user_2fa';

    protected $fillable = [
        'user_id',
        'google2fa_enable',
        'google2fa_secret',
        'recovery'
    ];

    protected $hidden = [
        'google2fa_enable',
        'google2fa_secret',
        'recovery',
    ];

    protected $casts = [
        'recovery' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(config('nova-google2fa.models.user'));
    }

    protected function google2faSecret(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  decrypt($value),
            set: fn ($value) =>  encrypt($value),
        );
    }
}
