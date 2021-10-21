<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function send(Request $request){

        Mail::to('vitaltest21@gmail.com')->send(
            new ContactanosMailable(
                $request->input('name'),
                $request->input('email'),
                $request->input('subject'),
                $request->input('message')
            )
        );

    }
}
