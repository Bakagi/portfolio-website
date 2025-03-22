<?php


namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }
    public function sendMail(Request $request)
    {
     $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:500',
     ]);
     Contact::create($request->all());
     $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
     ];
     Mail::to('azizlabidine@gmail.com')->send(new ContactMail($details));
     return back()->with('message_sent', 'Your message has been sent successfully!');
    }
}
