<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('project_id');
            $table->text('description')->nullable();
            $table->enum('status', ['Pending', 'Working', 'Done'])->default('Pending');
            $table->unsignedBigInteger('teammate_id')->nullable();
            $table->timestamps();
    
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('teammate_id')->references('id')->on('users')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
    
};
