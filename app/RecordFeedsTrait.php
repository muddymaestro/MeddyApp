<?php

namespace App;

trait recordFeedsTrait
{
    protected static function bootrecordFeedsTrait()
    {
        static::created(function($model) {
            $model->recordFeed('created');
        });
    }

    protected function recordFeed($event)
    {
        $this->feeds()->create([
            'user_id' => auth()->id(),
            'type' => $event.'_'.strtolower(class_basename($this))  // created_post
        ]);
    }

    public function feeds()
    {
        return $this->morphMany(ActivityFeed::class, 'feedable');
    }
}
