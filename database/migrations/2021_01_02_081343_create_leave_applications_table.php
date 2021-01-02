<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->mediumText('inrotmation')->nullable();
            $table->unsignedBigInteger('applier_user_id');
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('authorizer_user_id');
            $table->mediumText('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_applications');
    }
}
