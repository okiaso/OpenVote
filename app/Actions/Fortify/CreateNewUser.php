<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'user.first_name' => ['required', 'string', 'min:3', 'max:32'],
            'user.middle_name' => ['nullable', 'string', 'min:3', 'max:32'],
            'user.last_name' => ['required', 'string', 'min:3', 'max:32'],
            'user.username' => ['required', 'string', 'max:16', 'unique:users,username'],
            'user.phone' => ['required', 'string', 'max:16', 'unique:users,phone'],
            'user.email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $input['user']['password'] = Hash::make($input['password']);

        // dd($input);

        return DB::transaction(function () use ($input) {
            return tap(User::create($input['user']), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => $user->name . "'s Team",
            'personal_team' => true,
        ]));
    }
}
