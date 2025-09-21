<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->date('report_date');

            // Perubahan: Menggunakan sintaks foreign key yang lebih modern dan ringkas
            // Ini setara dengan $table->unsignedBigInteger('masyarakat_id');
            // dan $table->foreign('masyarakat_id')->references('id')->on('masyarakat');
            $table->foreignId('masyarakat_id')->constrained('masyarakat')->onDelete('cascade');

            $table->text('content');
            $table->string('photo')->nullable();
            $table->enum('status', ['0', 'proses', 'selesai'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}
