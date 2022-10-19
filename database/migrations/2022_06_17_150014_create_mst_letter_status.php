<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstLetterStatus extends Migration
{
    public function up()
    {
        Schema::create('mst_letter_status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('back_color')->nullable();
            $table->string('fore_color')->nullable();
            $table->boolean('main_status')->default(0);
            
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
        Schema::dropIfExists('mst_letter_status');
    }
}
