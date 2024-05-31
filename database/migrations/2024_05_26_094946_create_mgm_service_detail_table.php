<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMgmServiceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mgm_service_detail', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->longText('description')->nullable();
            $table->string('icon', 50)->nullable();
            $table->string('picture')->nullable();
            $table->bigInteger('header_id')->nullable();      // Join ke Tabel mgm_service
            $table->integer('order_no')->nullable();

            // Standard Structre
            $table->boolean('disabled')->default(0);
            $table->dateTime('created_at');
            $table->string('created_by')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('updated_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mgm_service_detail');
    }
}
