<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 * Parses Request $request so that services won't receive the whole Request $request
 * For easier unit testing
 */
class UserRequestParser
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public static function ParseParameters(Request $request): array
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
    }
}
