<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToMasyarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('masyarakat', function (Blueprint $table) {
            $table->text('address')->after('nik')->nullable();
            $table->enum('gender', ['laki-laki', 'perempuan'])->after('address')->nullable();
            $table->string('rt', 3)->after('gender')->nullable();
            $table->string('rw', 3)->after('rt')->nullable();
            $table->string('postal_code', 5)->after('rw')->nullable();

            // [FIX] Definisikan kolom village_id sebagai CHAR(10) agar sesuai dengan tabel villages
            $table->char('village_id', 10)->nullable()->after('postal_code');

            // [FIX] Buat relasi foreign key secara manual
            $table->foreign('village_id')->references('id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('masyarakat', function (Blueprint $table) {
            $table->dropForeign(['village_id']);
            $table->dropColumn(['address', 'gender', 'rt', 'rw', 'postal_code', 'village_id']);
        });
    }
}
