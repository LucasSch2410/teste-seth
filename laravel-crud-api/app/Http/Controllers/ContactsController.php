<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController
{
    // display a listing of contacts. return in JSON

    public function index()
    {
        $contacts = Contacts::all();
        return response()->json($contacts);
    }

    // save the contact
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $contact = Contacts::create($validateData);
        
        return response()->json($contact, 201);
    }

    // display the contact
    public function show(Contacts $contact)
    {
        return response()->json($contact);
    }

    // update the contact
    public function update(Request $request, Contacts $contact)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'id' => 'required|integer',
        ]);

        $contact->update($validateData);

        return response()->json($contact);
    }

    // delete a contact
    public function destroy (Contacts $contact)
    {
        $contact->delete();

        return response()->json(null, 204);
    }

}