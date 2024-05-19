<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class InviteCode extends Model
{
    public const TABLE = 'invite_codes';

    protected $table = self::TABLE;

    protected $fillable = [
        'code',
    ];
}
