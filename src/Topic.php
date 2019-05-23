<?php

namespace Canvas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Topic extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'canvas_topics';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get the posts relationship.
     *
     * @return HasManyThrough
     */
    public function posts(): HasManyThrough
    {
        return $this->HasManyThrough(
            Post::class,
            PostsTopics::class,
            'topic_id', // Foreign key on canvas_posts_topics table...
            'id', // Foreign key on canvas_posts table...
            'id', // Local key on canvas_topics table...
            'post_id' // Local key on canvas_posts_topics table...
        );
    }
}
