<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCompany extends Migration
{
    public function up()
    {
        Schema::create('mst_company', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->string('name');
            $table->string('address_1');
            $table->string('address_2', 3)->nullable(); // For RT
            $table->string('address_3', 3)->nullable(); // For RW
            $table->string('phone_no', 50)->nullable();
            $table->string('home_no', 50)->nullable();
            $table->string('fax_no', 50)->nullable();
            
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
        Schema::dropIfExists('mst_company');
    }
}
