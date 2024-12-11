<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class SearchCandidateController extends Controller
{
    public function showForm()
    {
        return view('candidate.search');
    }

    public function search(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        $candidate = Candidate::where('email', $request->email)->first();

        if (!$candidate) {
            return back()->with('error', 'Email tidak ditemukan.');
        }
        return view('candidate.search', ['candidate' => $candidate]);
    }
}
