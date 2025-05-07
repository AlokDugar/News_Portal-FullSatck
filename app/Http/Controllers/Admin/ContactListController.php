<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactList;
use App\Http\Controllers\Controller;

class ContactListController extends Controller
{
    public function index()
    {
        $contactLists=ContactList::all();
        return view('dashboard.contact.contact_lists',compact('contactLists'));
    }

    public function markSeen($id)
    {
        $contact = ContactList::findOrFail($id);
        $contact->is_read = true;
        $contact->save();

        return response()->json(['status' => 'success']);
    }

}
