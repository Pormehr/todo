<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public $usersTableName = 'users';

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->references('id')
                ->on($this->usersTableName)
                ->cascadeOnDelete();

            $table->string('title');
            $table->boolean('status')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
