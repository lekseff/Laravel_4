<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiTokenController extends Controller
{
    public function index(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::class::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user['password'])) {
            return response()->json(['error' => 'ERROR'], 401);
        }
//        dd($request->name);
        $token = $user->createToken($request->name);
        return $user;
//        return ['token' => $token->plainTextToken];
    }
}
