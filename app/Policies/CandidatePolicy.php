<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Candidate;
use App\Models\Company;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CandidatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can contact with the candidate
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function contact(?User $user, Candidate $candidate)
    {
        // Let just imagine company id is 1, (originally the company info should be included in $user)
        $companyId = 1;

        // Check if be able to contact
        // --> Check if you have enough coins to contact a new candidate.
        // --> And the candidate had already been contacted by you.
        return Company::find($companyId)->hasEnoughCoins() && $candidate->isAbleToContact($companyId)
            ? Response::allow()
            : Response::deny(config('constants.ERROR_MSGS.CANDIDATES.NOT_ABLE_TO_CONTACT'));
    }

    /**
     * Determine whether the user can contact with the candidate
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function hire(?User $user, Candidate $candidate)
    {
        $companyId = 1;

        // Check if be able to contact
        // --> Check if you have enough coins to contact a new candidate.
        // --> And the candidate had already been contacted by you.
        return $candidate->isAbleToHire($companyId)
            ? Response::allow()
            : Response::deny(config('constants.ERROR_MSGS.CANDIDATES.NOT_ABLE_TO_HIRE'));
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Candidate $candidate)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Candidate $candidate)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Candidate $candidate)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Candidate $candidate)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Candidate $candidate)
    {
        //
    }
}
