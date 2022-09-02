<?php

namespace CubeAgency\NovaGoogle2fa\Traits;

use CubeAgency\NovaGoogle2fa\Models\User2fa;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasGoogle2fa
{
    public function user2fa(): HasOne
    {
        return $this->hasOne(User2fa::class, 'user_id', 'id');
    }
}
