<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Handles database methods for User.
 */
class UserRepository implements RepositoryInterface
{
    /**
     * Gets a listing from the database.
     *
     * @return Collection
     */
    public function list(): Collection
    {
        return User::all();
    }

    /**
     * Stores a new data in the database.
     *
     * @param array $parameters
     *
     * @return User
     */
    public function store(array $parameters): User
    {
        $user = new User();

        $user->name = $parameters['name'];
        $user->email = $parameters['email'];
        $user->password = $parameters['password'];

        if ($user->save()) {
            return $user;
        }
    }

    /**
     * Displays the data from the database.
     *
     * @param int $id
     *
     * @return User
     *
     * @throws \Exception
     */
    public function show(int $id): User
    {
        return User::findOrFail($id);
    }

    /**
     * Updates the data in the database.
     *
     * @param array $parameters
     * @param int $id
     *
     * @return User
     *
     * @throws \Exception
     */
    public function update(array $parameters, int $id): User
    {
        $user = User::findOrFail($id);

        $user->name = $parameters['name'];
        $user->email = $parameters['email'];
        $user->password = $parameters['password'];

        if ($user->save()) {
            return $user;
        }
    }

    /**
     * Remove the specified data from th database.
     *
     * @param int $id
     *
     * @return User
     *
     * @throws \Exception
     */
    public function destroy(int $id): User
    {
        $user = User::findOrFail($id);

        if ($user->delete()) {
            return $user;
        }
    }
}
