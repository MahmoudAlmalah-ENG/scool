<?php

use App\Enum\WorkshopEnum;
use App\Models\Team;
use App\Models\Workshop;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('workshops', static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('icon');
            $table->dateTime('start_at');
            $table->dateTime('end_at')->nullable();
            $table->enum('status', WorkshopEnum::toArray())->default(WorkshopEnum::PENDING->value);
            $table->timestamps();
        });

        Schema::create('team_workshop', static function (Blueprint $table) {
            $table->foreignId('team_id')->constrained(Team::TABLE)->cascadeOnDelete();
            $table->foreignId('workshop_id')->constrained(Workshop::TABLE)->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workshops');
        Schema::dropIfExists('team_workshop');
    }
};
