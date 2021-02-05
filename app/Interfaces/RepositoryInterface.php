<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public function list();

    /**
     * Stores a new data in the database.
     *
     * @param array $parameters
     *
     * @return User
     */
    public function store(array $parameters);

    /**
     * Displays the data from the database.
     *
     * @param int $id
     *
     * @return User
     *
     * @throws \Exception
     */
    public function show(int $id);

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
    public function update(array $parameters, int $id);

    /**
     * Remove the specified data from th database.
     *
     * @param int $id
     *
     * @return User
     *
     * @throws \Exception
     */
    public function destroy(int $id);
}
