<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstDepartment extends Migration
{
    public function up()
    {
        Schema::create('mst_department', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->unsignedInteger('group_id')->nullable(); // Join ke Tabel mst_department_group
            $table->boolean('doc_ref')->default(1);
            $table->unsignedInteger('user_id')->nullable(); // Join ke Tabel mst_user dengan role Manager/Head
            
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
        Schema::dropIfExists('mst_department');
    }
}
