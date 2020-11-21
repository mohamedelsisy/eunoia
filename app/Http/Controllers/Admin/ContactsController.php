<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Mockery\Exception;

class ContactsController extends Controller
{
    public function index()
    {

        $contacts = Contact::select()->get();
        return view('admin.contacts.index', compact('contacts'));
    }



    public function answer($id)
    {
        //
        try {
            $contact = Contact::find($id);
            if (!$contact) {
                return redirect()->route('admin.contacts')->with(['error' => 'هذه الرسالة غير صحيحة']);
            }


            return view('admin.contacts.answer', compact('contact'));

        } catch (Exception $exception) {

            return redirect()->route('admin.contacts')->with(['error' => 'هناك خطأ ما']);

        }

    }


    public function send(ContactRequest $request)
    {
        try {

            $mail       = 'elsisym9@gmail.com';
            $name       = 'Test Mail';
            $subject    = $request->subject;
            $mailto     = $request->email;
            $message    = $request->message;


            $headers = 'From:'. $mail .'\r\n';
            $send = "Hello\r\nYou have new message from :  ".$name."\r\nWe contact us about  : " . $subject . "\r\n" .$message. "\r\n";

            mail($mailto, $subject, $send, $headers);


            return redirect()->route('admin.contacts')->with(['success' => 'تم إرسال الرسالة   بنجاح']);

        } catch (Exception $exception) {
            return redirect()->route('admin.contacts')->with(['error' => 'يوجد خطأ ما ']);

        }
    }


    public function destroy($id)
    {
        try {
            $contact = Contact::find($id);
            if (!$contact) {
                return redirect()->route('admin.contacts', $id)->with(['error' => 'هذه الرسالة غير صحيحة']);
            }

            $contact->delete();

            return redirect()->route('admin.contacts')->with(['success' => 'تم حذف الرسالة بنجاح']);

        } catch (Exception $e) {
            return redirect()->route('admin.contacts')->with(['error' => 'هناك خطأ ما ']);

        }
    }
}
