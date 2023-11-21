<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Mail;
use Illuminate\Http\Request;


class EmailBroadcasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = [
            "subject" => "test email from laravel",
            "body"  => "This Body for test email",
        ];

        Mail::to(['irfannurmuhammad21@gmail.com','hwalyonglance@gmail.com'])->send(new SendMail($test));
        dd("Email Berhasil Dikirim");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\emailBroadcaster  $emailBroadcaster
     * @return \Illuminate\Http\Response
     */
    public function show(emailBroadcaster $emailBroadcaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\emailBroadcaster  $emailBroadcaster
     * @return \Illuminate\Http\Response
     */
    public function edit(emailBroadcaster $emailBroadcaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\emailBroadcaster  $emailBroadcaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, emailBroadcaster $emailBroadcaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\emailBroadcaster  $emailBroadcaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(emailBroadcaster $emailBroadcaster)
    {
        //
    }
}
