<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_doctor', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('poli_name')->nullable();
            $table->string('description')->nullable();              // Penjelasan singkat terkait Dokter tersebut
            $table->longText('biography')->nullable();
            $table->string('degrees')->nullable();
            $table->longText('area_of_expertise')->nullable();      // Bidang Keahlian Dokter, pisahkan dengan tanda titik koma (;)
            $table->string('university')->nullable();
            $table->string('picture')->nullable();

            // Doctor Social Media
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();

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
        Schema::dropIfExists('mst_doctor');
    }
}
