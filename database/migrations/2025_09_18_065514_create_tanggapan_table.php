<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id();

            // [UPDATE] Menggunakan sintaks modern untuk foreign key.
            // Baris ini akan membuat kolom 'pengaduan_id' (unsignedBigInteger)
            // dan relasinya ke tabel 'pengaduan'.
            $table->foreignId('pengaduan_id')->constrained('pengaduan')->onDelete('cascade');

            $table->date('response_date');
            $table->text('response');

            // [UPDATE] Menggunakan sintaks modern untuk foreign key 'user_id'.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

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
        Schema::dropIfExists('tanggapan');
    }
}
