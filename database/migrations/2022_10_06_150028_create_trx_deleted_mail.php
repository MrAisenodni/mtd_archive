<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxDeletedMail extends Migration
{
    public function up()
    {
        Schema::create('trx_deleted_mail', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('deleted_id')->nullable(); // Join ke Tabel Utama
            $table->string('letter', 50)->nullable();

            // Struktur Baku
            $table->string('access_code')->nullable();
            $table->boolean('disabled')->default(0);
            $table->string('created_by')->nullable();
            $table->dateTime('created_at')->default(now());
            $table->string('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trx_deleted_mail');
    }
}
