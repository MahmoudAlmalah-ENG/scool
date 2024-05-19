<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Team extends Model
{
    use HasFactory;

    public const TABLE = 'teams';

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'icon',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            related: User::class,
            table: 'team_user',
            foreignPivotKey: 'team_id',
            relatedPivotKey: 'user_id',
            parentKey: 'id',
            relatedKey: 'id'
        );
    }

    public function workshops(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Workshop::class,
            table: 'team_workshop',
            foreignPivotKey: 'team_id',
            relatedPivotKey: 'workshop_id',
            parentKey: 'id',
            relatedKey: 'id'
        );
    }
}
