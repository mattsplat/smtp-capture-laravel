<?php

namespace App\Http\Controllers;

use App\Models\MailRecord;
use Illuminate\Http\Request;

class MailRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = MailRecord::get();
        return view('main', compact('emails'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailRecord  $mailRecord
     * @return \Illuminate\Http\Response
     */
    public function show(MailRecord $mailRecord)
    {
        $emails = MailRecord::get();

        return view('main', compact('emails', 'mailRecord'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailRecord  $mailRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailRecord $mailRecord)
    {
        $mailRecord->delete();
        return redirect('/');
    }
}
