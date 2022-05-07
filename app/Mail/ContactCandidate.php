<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\Candidate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactCandidate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The instances.
     *
     * @var \App\Models\Company
     * @var \App\Models\Candidate
     */
    public $company;
    public $candidate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Company $company, Candidate $candidate)
    {
        $this->company = $company;
        $this->candidate = $candidate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('candidates.emails.contact');
    }
}
