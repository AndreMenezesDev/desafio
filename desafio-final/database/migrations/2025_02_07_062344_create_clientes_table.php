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
        Schema::create('sis_clientes', function (Blueprint $table) {
            $table->increments('cli_id')->primary();
            $table->string('cli_nome',100);
            $table->string('cli_sobrenome',100);
            $table->string('cli_email',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sis_clientes');
    }
};
