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
        Schema::create('fmipa_dosen_datas', function (Blueprint $table) {
            $table->id();
            //$table->integer('id')->autoIncrement();
            $table->char('nip', 18)->default(null);
            $table->string('nama_lengkap', 50)->default(null);
            $table->enum('jenis_kelamin', ['L','P'])->default(null);
            $table->date('tanggal_gabung')->default(null);
            $table->timestamps();
            ///$table->timestamp('created_at')->default(undefined);

            // Indexes
            //$table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fmipa_dosen_datas');
    }
};
