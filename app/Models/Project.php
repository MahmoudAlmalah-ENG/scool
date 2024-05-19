<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

final class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public const TABLE = 'projects';

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'description',
        'video',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getVideoUrl(): string
    {
        return asset('storage/videos/' . $this->id . '/' . $this->video);

    }
}
