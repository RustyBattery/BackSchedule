<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'group_id' => ['nullable', 'integer', 'exists:groups,id'],
            'teacher_id' => ['nullable', 'integer', 'exists:teachers,id'],
            'is_admin' => ['nullable', 'boolean'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'group_id' => $input['group_id'] ?? null,
            'teacher_id' => $input['teacher_id'] ?? null,
            'is_admin' => $input['is_admin'] ?? false,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
