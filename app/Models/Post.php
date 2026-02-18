<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'category_id', 'editor_id', 'title', 'slug', 'content', 
        'cover_image', 'status', 'editor_notes', 'meta_title', 
        'meta_description', 'meta_keywords', 'views_count', 'published_at'
    ];

    const STATUS_DRAFT = 1;
    const STATUS_PENDING = 2;
    const STATUS_PUBLISHED = 3;
    const STATUS_REJECTED = 4;

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function editor(): BelongsTo {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }
}
