<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->boolean('mernis_verification',255);
            $table->timestamps();
        });

        DB::table('companies')->insert([
                ['name' => 'Starbucks','mernis_verification' => 1,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
                ['name' => 'Portal','mernis_verification' => 0,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
