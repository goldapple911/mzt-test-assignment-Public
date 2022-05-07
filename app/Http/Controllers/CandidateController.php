<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Mail\ContactCandidate;
use Illuminate\Support\Facades\Mail;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::getAllWithAvailabilities();
        $coins = Company::find(1)->wallet->coins;
        return view('candidates.index', compact('candidates', 'coins'));
    }

    public function contact(Candidate $candidate)
    {
        // If you have to add some validation rules, you can use App\Http\Requests\CandidateContactRequest
        // ... code for validating request ...

        // Check policy
        $this->authorize('contact', $candidate);

        // Finally contact!
        $company = Company::find(1);
        // --> Send an email
        Mail::to($candidate->email)->send(new ContactCandidate($company, $candidate));
        // --> Charge 5 coins
        $company->chargeCoins();
        // --> Create a negotiation
        $candidate->contact();
    }

    public function hire()
    {
        // @todo
        // Your code goes here...
    }
}
