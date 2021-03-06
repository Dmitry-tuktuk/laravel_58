<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogPost
 * @package App\Models
 *
 * @property App\Models\BlogCategory $category
 * @property App\Models\User         $user
 * @property string                  $title
 * @property string                  $slug
 * @property string                  $content_html
 * @property string                  $content_raw
 * @property string                  $excerpt
 * @property string                  $published_at
 * @property boolean                 $is_published
 */

class BlogPost extends Model
{
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'content_raw',
        'is_published',
        'published_at',
    ];

    /**
     * Категория статьи.
     *
     *@return BelongsTo
     */
    public function category()
    {
        //Статья принадлежат пользователю
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Автор  статьи.
     *
     *@return BelongsTo
     */
    public function user()
    {
        //Статья пренадлежит пользователю
        return $this->belongsTo(User::class);
    }
}
