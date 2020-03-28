<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationCollection;
use App\Http\Resources\NotificationResource;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function all()
    {
        $voices = Notification::latest()->paginate(10);
        return NotificationCollection::collection($voices);
    }

    public function find($id)
    {
        if ($voice = Notification::find($id)) {
            return new NotificationResource($voice);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'آلارم یافت نشد'
        ]);
    }
}
