<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
       Schema::create('applications', function (Blueprint $table) {
    $table->id();

    // Reference 'id' in 'job' table explicitly
    $table->foreignId('job_id')
        ->constrained('job') // tell Laravel to use 'job' table
        ->onDelete('cascade');

    $table->foreignId('user_id')
        ->constrained() // defaults to 'users' table
        ->onDelete('cascade');

    $table->string('status')->default('pending'); // pending, interview, approved, rejected
    $table->text('cover_letter')->nullable();
    $table->string('resume_path')->nullable();
    $table->dateTime('interview_date')->nullable();
    $table->text('interview_notes')->nullable();
    $table->text('rejection_reason')->nullable();
    $table->timestamps();
});

    }

    public function down()
{
    Schema::table('applications', function (Blueprint $table) {
        $table->dropForeign(['job_id']);
        $table->foreign('job_id')->references('id')->on('job')->onDelete('cascade');
    });
}

};
