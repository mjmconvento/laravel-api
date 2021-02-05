<?php

namespace App\Services;

use App\Constants\StatusCode;
use App\Constants\StatusMessage;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Interfaces\RepositoryInterface;
use Illuminate\Http\JsonResponse;

/**
 * Handles service methods for User.
 */
class UserService
{
    /**
     * @var string STORE
     */
    private const STORE = 'store';

    /**
     * @var string SHOW
     */
    private const SHOW = 'show';

    /**
     * @var string UPDATE
     */
    private const UPDATE = 'update';

    /**
     * @var string DESTROY
     */
    private const DESTROY = 'destroy';

    /**
     * @param RepositoryInterface $userRepository
     */
    public function __construct(RepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Gets a listing from the repository.
     *
     * @return UserCollection
     */
    public function list(): UserCollection
    {
        return new UserCollection($this->userRepository->list());
    }

    /**
     * Calls the store method from the repository.
     *
     * @param array $parameters
     *
     * @return JsonResponse
     */
    public function store(array $parameters): JsonResponse
    {
        return $this->callAction(self::STORE, $parameters);
    }

    /**
     * Display the specified resource from the repository.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->callAction(self::SHOW, [], $id);
    }

    /**
     * Update the specified resource in repository.
     *
     * @param array $parameters
     * @param int $id
     *
     * @return JsonResponse
     */
    public function update(array $parameters, int $id): JsonResponse
    {
        return $this->callAction(self::UPDATE, $parameters, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->callAction(self::DESTROY, [], $id);
    }

    /**
     * Calls the action in Repository.
     *
     * @param string $type
     * @param array $parameters
     * @param int $id
     *
     * @return JsonResponse
     */
    private function callAction(string $type, array $parameters = [], int $id = null): JsonResponse
    {
        $user = null;

        try {
            $user = match($type) {
                self::STORE => $this->userRepository->store($parameters),
                self::SHOW => $this->userRepository->show($id),
                self::UPDATE => $this->userRepository->update($parameters, $id),
                self::DESTROY =>  $this->userRepository->destroy($id)
            };

            $status = StatusCode::SUCCESS;
            $message = StatusMessage::SUCCESS;
        } catch (\Exception $e) {
            $status = StatusCode::INTERNAL_SERVER_ERROR;
            $message = $e->getMessage();
        }

        return (new UserResource($user))->response([
            'status' => $status,
            'message' => $message
        ])->setStatusCode($status);
    }
}
