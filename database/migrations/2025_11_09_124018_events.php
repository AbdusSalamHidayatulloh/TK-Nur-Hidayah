<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *  'event_name',
        'event_date_start',
        'event_date_end',
        'event_description'
     */
    public function up(): void
    {
        Schema::create('events', function(Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('event_date_start');
            $table->string('event_date_end');
            $table->string('event_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
