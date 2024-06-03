<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMgmContactInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mgm_contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('icon', 50)->nullable();
            $table->bigInteger('menu_id')->nullable();      // Join ke Tabel stg_menu
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
        Schema::dropIfExists('mgm_contact_info');
    }
}
