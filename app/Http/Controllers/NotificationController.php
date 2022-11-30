<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function deleteNotice($id)
    {
        $deleteNotice = User::find(auth()->user()->id);
        $notice = $deleteNotice->notifications->delete($id);
    }
}
