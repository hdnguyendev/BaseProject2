<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    private $client_model;
    public function __construct()
    {
        $this->client_model  = new Client();
    }
    public function view_send_mail_id($id)
    {
        $data = $this->client_model->getData($id);
        return view('admin.pages.sendmail')->with('data', $data);
    }
    public function view_send_mail_all()
    {
        return view('admin.pages.sendmailtoAll');
    }
    public function sendMail(Request $request)
    {

        $data = $this->client_model->getData($request->client_id);

        $mailData = [
            'title' => $request->title,
            'body' => $request->body
        ];
        if (Mail::to($data->client_email)->send(new SendMail($mailData))) {
            return redirect()->back()->with('success', 1);
        } else {
            return Redirect::back()->with('failed', 0);
        };
    }
    public function sendAllMail(Request $request)
    {
        $clients = $this->client_model->getAll();

        $mailData = [
            'title' => $request->title,
            'body' => $request->body
        ];
        foreach ($clients as $client) {
            if (Mail::to($client->client_email)->send(new SendMail($mailData))) {
            } else {
                return Redirect::back()->with('failed', 0);
            };
        }
        return redirect()->back()->with('success',1);

    }
}
