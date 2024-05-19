<?php

namespace App\Models;

use App\Enum\UserEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

final class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const TABLE = 'users';

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'avatar',
        'school',
        'birthday',
        'role',
        'gender',
        'password',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === UserEnum::ADMIN->value;
    }

    public function isUser(): bool
    {
        return $this->role === UserEnum::USER->value;
    }

    public function isMale(): bool
    {
        return $this->gender === UserEnum::MALE->value;
    }

    public function isFemale(): bool
    {
        return $this->gender === UserEnum::FEMALE->value;
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Team::class,
            table: 'team_user',
            foreignPivotKey: 'user_id',
            relatedPivotKey: 'team_id',
            parentKey: 'id',
            relatedKey: 'id'
        );
    }

    public function Avatar(): string
    {
        if ($this->avatar) {
            return asset('storage/avatars/' . $this->id . '/' . $this->avatar);
        }

        return $this->isFemale() ? asset('assets/img/avatars/15.png') : asset('assets/img/avatars/14.png');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'user_id', 'id');
    }
}
