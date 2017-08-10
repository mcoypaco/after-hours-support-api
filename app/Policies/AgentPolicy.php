<?php

namespace App\Policies;

use App\User;
use App\Agent;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentPolicy
{
    use HandlesAuthorization;

    // public function before($user, $ability)
    // {
    //     if ($user->is_admin) {
    //         return true;
    //     }
    // }

    /**
     * Determine whether the user can view the Agent.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function view(User $user, Agent $agent)
    {
        //
    }

    /**
     * Determine whether the user can create Agents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('manage-settings');
    }

    /**
     * Determine whether the user can update the Agent.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function update(User $user, Agent $agent)
    {
        //
    }

    /**
     * Determine whether the user can delete the Agent.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function delete(User $user, Agent $agent)
    {
        //
    }
}
