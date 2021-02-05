<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Services\UserRequestParser;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Gets a listing using the service.
     *
     * @return UserCollection
     */
    public function index(): UserCollection
    {
        return $this->userService->list();
    }

    /**
     * Stores newly created data using the service.
     *
     * @param Request $request
     *
     * @return JsonResonse
     */
    public function store(Request $request): JsonResponse
    {
        return $this->userService->store(UserRequestParser::ParseParameters($request));
    }

    /**
     * Shows data using the service.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        return $this->userService->show($id);
    }

    /**
     * Updates the specified data using the service.
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): JsonResponse
    {
        return $this->userService->update(UserRequestParser::ParseParameters($request), $id);
    }

    /**
     * Remove the data from storage using the service.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->userService->destroy($id);
    }
}
