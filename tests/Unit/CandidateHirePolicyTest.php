<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Candidate;
use App\Models\Negotiation;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CandidateHirePolicyTest extends TestCase
{
    // use RefreshDatabase;
    // use WithoutMiddleware;

    public function testInvalidCandidate()
    {
        $response = $this->post('/candidates/100/contact');

        $response->assertStatus(404);
    }

    public function testAbleToHireWithAContactedCandidate()
    {
        Negotiation::truncate();

        $response = $this->patch('/candidates/1/hire');

        $response->assertStatus(403);
    }

    public function testAbleToHireWithAHiredCandidate()
    {
        Negotiation::updateOrCreate(['company_id' => 1, 'candidate_id' => 1], ['status' => 'hired']);

        $response = $this->patch('/candidates/1/hire');

        $response->assertStatus(403);
    }
}
