<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kritik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim');
            $table->text('kritik_saran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kritik', function (Blueprint $table) {
            $table->dropColumn('nama_pengirim');
            $table->dropColumn('kritik_saran');
        });
        Schema::dropIfExists('kritik');
    }
};
