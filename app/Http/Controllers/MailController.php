<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    private $client_model;
    public function __construct() {
        $this->client_model  = new Client();
    }
    public function index($id)
    {
        return view('admin.pages.sendmail')->with('id', $id);
    }
    public function sendMail(Request $request){
        // $data = $this->client_model->getData($id);

        // $mailData = [
        //     'title' => $data->client_email,
        //     'body' => $id
        // ];
        // Mail::to('nguyenhd.dev@gmai.com')->send(new SendMail($mailData));

        dd("Email is sent successfully.");
    }
    public function sendAllMail(Request $request)
    {

    }

}
