<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ApiTokenController extends Controller
{
    public function index(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::class::where('email', $data['email'])->first();
        dd($user);
    }
}
