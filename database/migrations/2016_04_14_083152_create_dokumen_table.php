<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->string('dokumen_file');
            $table->string('dokumen_store');
            $table->decimal('dokumen_ukuran',10,2);
            $table->text('dokumen_deskripsi');
            $table->string('dokumen_komentar');  
            $table->integer('dokumen_publish');
            $table->integer('dokumen_author')->unsigned();            
            $table->integer('hapus')->default(1);
            $table->increments('id');
            
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            
            $table->index('dokumen_file');
            $table->index('dokumen_publish');
            $table->index('hapus');
            
            $table->foreign('dokumen_author')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
        
        Schema::create('dokumen_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('dokumen_id')->unsigned();
            $table->integer('role')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('dokumen_id')
                  ->references('id')->on('dokumen')
                  ->onDelete('cascade');
            
        });
        
        Schema::create('departemen_dokumen', function (Blueprint $table) {
            $table->integer('departemen_id')->unsigned();
            $table->integer('dokumen_id')->unsigned();
            $table->integer('role')->unsigned();
            $table->timestamps();
            
            $table->foreign('departemen_id')
                  ->references('id')->on('departemen')
                  ->onDelete('cascade');
            $table->foreign('dokumen_id')
                  ->references('id')->on('dokumen')
                  ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dokumen');
        Schema::drop('dokumen_user');
        Schema::drop('departemen_dokumen');
    }
}
