<?php

namespace App\Http\Controllers;

use App\Models\PDF;
use Illuminate\Http\Request;

use Mail;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["email"] = "buyabc@abcgroup.com";
        $data["title"] = "From buyabc@abcgroup.com";
        $data["body"] = "This is Demo";
  
        $pdf = PDF::loadView('emails.myTestMail', $data);
  
        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
  
        dd('Mail sent successfully');
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
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function show(PDF $pDF)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function edit(PDF $pDF)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PDF $pDF)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function destroy(PDF $pDF)
    {
        //
    }
}
