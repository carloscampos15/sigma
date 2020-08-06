<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $input = $request->all();
        $contact = new Contact();
        $contact->fill($input);
        $contact->save();
        return array(
            "success" => "¡Tu información ha sido recibida satisfactoriamente!",
        );
    }
}
