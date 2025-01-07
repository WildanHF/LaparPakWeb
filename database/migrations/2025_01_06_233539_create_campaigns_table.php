<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key dengan AUTO_INCREMENT
            $table->string('name', 255); // Kolom name bertipe string
            $table->text('description'); // Kolom description bertipe text
            $table->decimal('goal_amount', 15, 2); // Kolom goal_amount bertipe decimal
            $table->decimal('current_amount', 15, 2)->default(0); // Kolom current_amount dengan default 0
            $table->string('status', 255)->default('ACTIVE'); // Kolom status dengan default 'ACTIVE'
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
