<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->user()->notifications->markAsRead();
        return back();
    }
}
