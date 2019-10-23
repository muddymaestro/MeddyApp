<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityFeed extends Model
{
    protected $guarded = [];

    public function feedable()
    {
        return $this->morphTo();
    }
}
