<?php

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teams', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->string('description');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::create('team_user', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained(Team::TABLE)->cascadeOnDelete();
            $table->foreignId('user_id')->constrained(User::TABLE)->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('team_user');
    }
};
