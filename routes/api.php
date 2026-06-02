<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        $user = $request->user();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()->pluck('name'),
        ]);
    });

    Route::middleware('scopes:manage-blog')->group(function () {
        Route::get('/posts', function () {
            return response()->json(['message' => 'Blog posts endpoint - requires manage-blog scope']);
        });
    });

    Route::middleware('scopes:manage-courses')->group(function () {
        Route::get('/courses', function () {
            return response()->json(['message' => 'Courses endpoint - requires manage-courses scope']);
        });
    });

    Route::middleware('scopes:manage-portfolio')->group(function () {
        Route::get('/projects', function () {
            return response()->json(['message' => 'Portfolio projects endpoint - requires manage-portfolio scope']);
        });
    });
});

Route::get('/health', function () {
    return response()->json(['status' => 'ok', 'service' => 'ARCHFOUNDRY SSO']);
});
