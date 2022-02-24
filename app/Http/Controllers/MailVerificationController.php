<?php

namespace App\Http\Controllers;

use App\Models\MailVerification;
use App\Http\Requests\StoreMailVerificationRequest;
use App\Http\Requests\UpdateMailVerificationRequest;

class MailVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreMailVerificationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMailVerificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailVerification  $mailVerification
     * @return \Illuminate\Http\Response
     */
    public function show(MailVerification $mailVerification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailVerification  $mailVerification
     * @return \Illuminate\Http\Response
     */
    public function edit(MailVerification $mailVerification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMailVerificationRequest  $request
     * @param  \App\Models\MailVerification  $mailVerification
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMailVerificationRequest $request, MailVerification $mailVerification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailVerification  $mailVerification
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailVerification $mailVerification)
    {
        //
    }
}
