<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfos=ContactInfo::all();
        return view('dashboard.contact.contact_infos',compact('contactInfos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:contact_infos,email',
            'phone' => 'string|min:10|max:10',
        ]);

        ContactInfo::create($request->only('email', 'phone'));

        return redirect()->back()->with('success', 'Contact info added successfully!');
    }

    public function update(Request $request, $id)
    {
        $contactInfo = ContactInfo::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:contact_infos,email,' . $contactInfo->id,
            'phone' => 'string|min:10|max:10',
        ]);

        $contactInfo->update($request->only('email', 'phone'));

        return redirect()->back()->with('success', 'Contact info updated successfully!');
    }

    public function destroy($id)
    {
        $contactInfo = ContactInfo::findOrFail($id);
        $contactInfo->delete();

        return redirect()->back()->with('success', 'Contact info deleted successfully!');
    }

}
