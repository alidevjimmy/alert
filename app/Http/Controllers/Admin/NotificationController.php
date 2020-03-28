<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::latest()->get();
        return view('admin.pages.notifications.index' , compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'sendDate' => 'required',
            'link' => 'required'
        ]);
        Notification::create($validatedData);
        return redirect(route('admin.notifications.index'))->with([
           'status' => 'success',
           'message' => 'نوتیفیکیشن ثبت شد'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        return view('admin.pages.notifications.edit' , compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'link' => 'required'
        ]);
        if (!$request->sendDate) {
            $validatedData['sendDate'] = $notification->sendDate;
        }
        $notification->update($validatedData);
        return redirect(route('admin.notifications.index'))->with([
            'status' => 'success',
            'message' => 'نوتیفیکیشن ویرایش شد'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect(route('admin.notifications.index'))->with([
           'status' => 'success',
           'message' => 'نوتیفیکیشن حذف شد'
        ]);
    }
}
