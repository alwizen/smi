<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('id_candidate')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('whatsapp');
            $table->string('domicile');
            $table->string('passport_number')->nullable();
            $table->date('birth_date');
            $table->string('phone');
            $table->string('instagram_account');
            $table->string('institution');
            $table->string('study_program');
            $table->text('organization_experience')->nullable();
            $table->text('program_reason');
            $table->string('poster_proof');
            $table->string('instagram_follow_proof');
            $table->string('instagram_comment_proof');
            $table->string('whatsapp_share_proof');
            $table->boolean('is_valid')->nullable();
            $table->timestamps();
        });

        Schema::create('valid_candidates', function (Blueprint $table) {
            $table->id();
            $table->string('id_candidate')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('whatsapp');
            $table->string('domicile');
            $table->string('passport_number')->nullable();
            $table->date('birth_date');
            $table->string('phone');
            $table->string('instagram_account');
            $table->string('institution');
            $table->string('study_program');
            $table->text('organization_experience')->nullable();
            $table->text('program_reason');
            $table->string('poster_proof');
            $table->string('instagram_follow_proof');
            $table->string('instagram_comment_proof');
            $table->string('whatsapp_share_proof');
            $table->boolean('is_valid')->nullable();
            $table->timestamps();
        });
        Schema::create('rejected_candidates', function (Blueprint $table) {
            $table->id();
            $table->string('id_candidate')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('whatsapp');
            $table->string('domicile');
            $table->string('passport_number')->nullable();
            $table->date('birth_date');
            $table->string('phone');
            $table->string('instagram_account');
            $table->string('institution');
            $table->string('study_program');
            $table->text('organization_experience')->nullable();
            $table->text('program_reason');
            $table->string('poster_proof');
            $table->string('instagram_follow_proof');
            $table->string('instagram_comment_proof');
            $table->string('whatsapp_share_proof');
            $table->boolean('is_valid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
        Schema::dropIfExists('valid_candidates');
        Schema::dropIfExists('rejected_candidates');
    }
};
