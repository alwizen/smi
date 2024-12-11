<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'id_candidate',
        'name',
        'email',
        'whatsapp',
        'domicile',
        'passport_number',
        'birth_date',
        'phone',
        'instagram_account',
        'institution',
        'study_program',
        'organization_experience',
        'program_reason',
        'poster_proof',
        'instagram_follow_proof',
        'instagram_comment_proof',
        'whatsapp_share_proof',
        'is_valid',
    ];

    protected $dates = [
        'birth_date',
    ];

    protected static function booted()
    {
        static::creating(function ($candidate) {
            // Mendapatkan tahun saat ini
            $year = Carbon::now()->format('Y');

            // Membuat ID kandidat dengan format smi-tahun-ini-3 digit random
            $randomNumber = rand(100, 999); // Angka acak tiga digit
            $candidate->id_candidate = "smi{$year}{$randomNumber}";
        });
}
}
