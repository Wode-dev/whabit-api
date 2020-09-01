<?php

namespace App\Policies;

use App\Habit;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HabitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Habit  $habit
     * @return mixed
     */
    public function view(User $user, Habit $habit)
    {
        try {
            return $habit->user->id == $user->id;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Habit  $habit
     * @return mixed
     */
    public function update(User $user, Habit $habit)
    {
        try {
            return $habit->user->id == $user->id;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Habit  $habit
     * @return mixed
     */
    public function delete(User $user, Habit $habit)
    {
        try {
            return $habit->user->id == $user->id;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Habit  $habit
     * @return mixed
     */
    public function restore(User $user, Habit $habit)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Habit  $habit
     * @return mixed
     */
    public function forceDelete(User $user, Habit $habit)
    {
        try {
            return $habit->user->id == $user->id;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
