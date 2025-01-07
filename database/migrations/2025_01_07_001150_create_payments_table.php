<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary key dengan auto increment
            $table->unsignedBigInteger('campaign_id'); // Kolom untuk foreign key ke tabel campaigns
            $table->string('status', 255)->default('ACTIVE'); // Kolom status dengan default ACTIVE
            $table->decimal('amount', 15, 2); // Kolom amount bertipe decimal
            $table->timestamps(); // Kolom created_at dan updated_at dengan timestamp otomatis

            // Foreign key constraint
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
