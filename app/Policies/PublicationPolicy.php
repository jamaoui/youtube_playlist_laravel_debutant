<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use App\Models\publication;
use Illuminate\Auth\GenericUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class publicationPolicy
{
    use HandlesAuthorization;

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
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, publication $publication)
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
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Profile  $user, publication $publication)
    {
        return $user->id === $publication->profile_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, publication $publication)
    {
        return $user->id === $publication->profile_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, publication $publication)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, publication $publication)
    {
        //
    }

}
