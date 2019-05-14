<?php

namespace Canvas;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTags extends Pivot
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'canvas_posts_tags';
}
