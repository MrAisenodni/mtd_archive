<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStgGroupMenu extends Migration
{
    public function up()
    {
        Schema::create('stg_group_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id'); // Join ke Tabel stg_login
            $table->unsignedInteger('menu_id'); // Join ke Tabel stg_menu/stg_submenu
            $table->string('name', 100);
            $table->text('description')->nullable();
            
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
        Schema::dropIfExists('stg_group_menu');
    }
}
