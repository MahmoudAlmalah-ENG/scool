<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Workshop extends Model
{
    use HasFactory;

    public const TABLE = 'workshops';

    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'status',
    ];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Team::class,
            table: 'team_workshop',
            foreignPivotKey: 'workshop_id',
            relatedPivotKey: 'team_id',
            parentKey: 'id',
            relatedKey: 'id'
        );
    }

    public function getFormattedStartAtAttribute(): string
    {
        return \Carbon\Carbon::parse($this->start_at)->format('d/m/Y');
    }

    public function getFormattedEndAtAttribute(): string
    {
        return \Carbon\Carbon::parse($this->end_at)->format('d/m/Y');
    }
}
