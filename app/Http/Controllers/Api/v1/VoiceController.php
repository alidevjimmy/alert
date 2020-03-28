<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoiceCollection;
use App\Http\Resources\VoiceResource;
use App\Voice;
use Illuminate\Http\Request;

class VoiceController extends Controller
{
    public function all()
    {
        $voices = Voice::latest()->paginate(10);
        return VoiceCollection::collection($voices);
    }

    public function find($id)
    {
        if ($voice = Voice::find($id)) {
            return new VoiceResource($voice);
        }
        return response()->json([
           'status' => 'error',
            'message' => 'آلارم یافت نشد'
        ]);
    }
}
