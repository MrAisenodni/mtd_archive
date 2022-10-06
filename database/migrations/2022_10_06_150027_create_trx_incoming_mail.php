<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxIncomingMail extends Migration
{
    public function up()
    {
        Schema::create('trx_incoming_mail', function (Blueprint $table) {
            $table->id();
            $table->string('letter_title', 150);
            $table->string('letter_no', 60);
            $table->string('letter_about', 100)->nullable();
            $table->string('letter_appendix');
            $table->date('letter_date');
            $table->string('letter_place', 100);
            $table->string('letter_address')->nullable();
            $table->string('sender_name', 100)->nullable(); // Nama Pengirim
            $table->string('sender_no', 50)->nullable(); // Nomor Pengirim
            $table->string('sender_position', 100)->nullable(); // Jabatan Pengirim
            $table->string('sender_company', 100)->nullable(); // Perusahaan Pengirim
            $table->unsignedInteger('letter_type_id')->nullable(); // Join ke Tabel mst_letter_type
            $table->unsignedInteger('letter_status_id')->nullable(); // Join ke Tabel mst_letter_status
            $table->text('letter_file')->nullable(); // Lokasi penyimpanan Surat Masuk

            // Struktur Baku
            $table->boolean('disabled')->default(0);
            $table->string('created_by')->nullable();
            $table->dateTime('created_at')->default(now());
            $table->string('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trx_incoming_mail');
    }
}
