<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class ChatController extends Controller
{
    public function index()
    {
        $pharmacists = User::whereHas("roles", function($query){ $query->where("name", "Farmacéutico"); })->get();
        return view('chat.index', compact('pharmacists'));
    }

    public function sendMessage()
    {

    }
}
