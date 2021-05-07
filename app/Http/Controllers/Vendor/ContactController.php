<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;
class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        // return $request->all();
        Contact::create($request->except(['_token']));
        session()->flash('success','Your message has been sent. Thank you!');
        return redirect()->back();
    }
}
