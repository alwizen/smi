<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function create()
    {
        return view('candidate.create');
    }


   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email',
            'whatsapp' => 'required|string|max:20',
            'domicile' => 'required|string|max:255',
            'passport_number' => 'nullable|string|max:50',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:20',
            'instagram_account' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'study_program' => 'required|string|max:255',
            'organization_experience' => 'nullable|string',
            'program_reason' => 'required|string',
            'poster_proof' => 'required|file|mimes:jpg,jpeg,png|max:1024',
            'instagram_follow_proof' => 'required|file|mimes:jpg,jpeg,png|max:1024',
            'instagram_comment_proof' => 'required|file|mimes:jpg,jpeg,png|max:1024',
            'whatsapp_share_proof' => 'required|file|mimes:jpg,jpeg,png|max:1024',
            'declaration' => 'accepted',
        ]);

        // Upload files and save paths
        $posterProofPath = $request->file('poster_proof')->store('uploads/poster_proofs', 'public');
        $instagramFollowProofPath = $request->file('instagram_follow_proof')->store('uploads/follow_proofs', 'public');
        $instagramCommentProofPath = $request->file('instagram_comment_proof')->store('uploads/comment_proofs', 'public');
        $whatsappShareProofPath = $request->file('whatsapp_share_proof')->store('uploads/share_proofs', 'public');

  


        // Create candidate
        Candidate::create([
            // 'id_candidate' => $request->$candidateId,
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'domicile' => $request->domicile,
            'passport_number' => $request->passport_number,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'instagram_account' => $request->instagram_account,
            'institution' => $request->institution,
            'study_program' => $request->study_program,
            'organization_experience' => $request->organization_experience,
            'program_reason' => $request->program_reason,
            'poster_proof' => $posterProofPath,
            'instagram_follow_proof' => $instagramFollowProofPath,
            'instagram_comment_proof' => $instagramCommentProofPath,
            'whatsapp_share_proof' => $whatsappShareProofPath,
        ]);

        return back()->with('success', 'Terima Kasih sudah melakukan registrasi, Cek secara berkala pada menu Cek Kandidat ya !');
    }
}