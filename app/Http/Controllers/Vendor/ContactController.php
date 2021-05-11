<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Validator;
class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
         return $request;
        Contact::create($request->except(['_token']));
        session()->flash('success','Your message has been sent. Thank you!');
        return redirect()->back();
    }

    public function contactstore(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        if ($validator->passes()) {
            $contact = Contact::create($request->except(['_token']));
            session()->flash('success','Your message has been sent. Thank you!');
            // return response()->json([$contact =>'contact','status'=>'success']);
            return json_encode(['contact' =>'contact','status'=>'success']);
        }
        return response()->json(['error'=>$validator->errors()]);
    }
}
