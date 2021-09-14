<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notice() {
        $id = auth()->id();
        $notice = Notification::where('user_id',$id)->get();
        $count = Notification::where('user_id',$id)->count();
        return json_encode(['notice'=>$notice,'count'=>$count]);
    }
}
