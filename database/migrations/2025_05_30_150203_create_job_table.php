<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration
{
    public function up()
    {
      
        Schema::create('job',function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('job_type'); // Full-time, Part-time, Contract
            $table->decimal('salary', 10, 2)->nullable();
            $table->text('requirements')->nullable();
            $table->text('responsibilities')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('duties');
    }
}


