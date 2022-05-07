<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Candidate;
use App\Models\Negotiation;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CandidateContactPolicyTest extends TestCase
{
    // use RefreshDatabase;
    // use WithoutMiddleware;

    public function testInvalidCandidate()
    {
        $response = $this->post('/candidates/100/contact');

        $response->assertStatus(404);
    }

    public function testCompanyCoins()
    {
        $company = Company::find(1);
        $company->wallet->coins = 3;
        $company->wallet->save();

        $response = $this->post('/candidates/1/contact');

        $response->assertStatus(403);
    }

    public function testAbleToContactWithAContactedCandidate()
    {
        Negotiation::updateOrCreate(['company_id' => 1, 'candidate_id' => 1], ['status' => 'contacted']);

        $response = $this->post('/candidates/1/contact');

        $response->assertStatus(403);
    }

    public function testAbleToContactWithAHiredCandidate()
    {
        Negotiation::updateOrCreate(['company_id' => 1, 'candidate_id' => 1], ['status' => 'hired']);

        $response = $this->post('/candidates/1/contact');

        $response->assertStatus(403);
    }
}
