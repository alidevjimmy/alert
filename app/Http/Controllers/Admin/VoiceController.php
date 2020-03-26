<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Voice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $voices = Voice::all();
        return view('admin.pages.voices.index' , compact('voices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.pages.voices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return object
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required',
           'voice' => 'required|mimes:mpga'
        ]);
        $fileName = time().'.'.$request->file('voice')->extension();
        $request->file('voice')->move(public_path('voices') , $fileName);
        $insertData = Voice::create([
            'name' => $request->name,
            'url' => '/voices/'.$fileName,
            'admin_id' => auth()->guard('admin')->user()->id
        ]);
        if ($insertData) {
            return redirect(route('admin.voices.index'))->with([
                'status' => 'success',
                'message' => 'آلارم ثبت شد'
            ]);
        }
        else {
            return back()->with([
                'status' => 'error',
                'message' => 'خطایی رخ داده است ، لطفا دوباره تلاش کنید.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Voice $voice
     * @return void
     */
    public function show(Voice $voice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Voice $voice
     * @return void
     */
    public function edit(Voice $voice)
    {
        return view('admin.pages.voices.edit' , compact('voice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Voice $voice
     * @return object
     */
    public function update(Request $request, Voice $voice)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'voice' => 'mimes:mpga'
        ]);
        if ($request->file('voice')) {
            $fileName = time().'.'.$request->file('voice')->extension();
            $request->file('voice')->move(public_path('voices') , $fileName);
            $voice['url'] = '/voices/'.$fileName;
        }
        $voice->update([
           'name' => $request->name,
           'url' => $voice['url']
        ]);
        return redirect(route('admin.voices.index'))->with([
            'status' => 'success',
            'message' => 'آلارم ویرایش شد'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Voice $voice
     * @return object
     */
    public function destroy(Voice $voice)
    {
        if ($voice->delete()) {
            return redirect(route('admin.voices.index'))->with([
                'status' => 'success',
                'message' => 'آلارم حذف شد'
            ]);
        }
        else {
            return back()->with([
                'status' => 'error',
                'message' => 'خطایی رخ داده است ، لطفا دوباره تلاش کنید.'
            ]);
        }
    }
}
