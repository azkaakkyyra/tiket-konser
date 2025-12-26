<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ticket_code')->unique();
            $table->enum('type', ['vip', 'regular']);
            $table->enum('status', ['waiting', 'checked_in'])->default('waiting');
            $table->timestamp('ordered_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
