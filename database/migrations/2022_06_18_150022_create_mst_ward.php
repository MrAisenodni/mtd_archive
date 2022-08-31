<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstWard extends Migration
{
    public function up()
    {
        Schema::create('mst_ward', function (Blueprint $table) {
            $table->id();
            $table->string('post_code', 5);
            $table->string('name');
            $table->unsignedInteger('district_id');
            
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
        Schema::dropIfExists('mst_ward');
    }
}
