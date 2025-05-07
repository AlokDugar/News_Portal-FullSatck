<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactList;
use Illuminate\Http\Request;
use App\Http\Resources\ContactListResource;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactListApiController extends Controller
{
    public function index()
    {
        $contacts = ContactList::all();
        return ContactListResource::collection($contacts);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable|string|min:10|max:10',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'An error has occurred.',
                'errors' => $validator->errors()
            ], 422);
        }

        $emailCount = ContactList::where('email', $request->email)->count();

        if ($emailCount >= 5) {
            return response()->json([
                'message' => 'Limit for inquiry exceeded.',
            ], 422);
        }

        $contact = ContactList::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        Mail::to('alokdugar4@gmail.com')->send(new ContactFormSubmitted([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]));


        return response()->json([
            'message' => 'Contact created successfully',
            'data' => new ContactListResource($contact)
        ]);

    }

/*
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $contact = ContactList::find($id);

        if (!$contact) {
            return response()->json(['error' => 'Contact not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:50',
            'email' => 'sometimes|required|email',
            'phone' => 'sometimes|required|string|min:10|max:10',
            'subject' => 'sometimes|required|string|max:255',
            'message' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'An error has occurred.',
                'errors' => $validator->errors()
            ], 422);
        }

        $contact->update([
            'name' => $request->name ?? $contact->name,
            'email' => $request->email ?? $contact->email,
            'phone' => $request->phone ?? $contact->phone,
            'subject' => $request->subject ?? $contact->subject,
            'message' => $request->message ?? $contact->message,
        ]);

        return response()->json([
            'message' => 'Contact updated successfully',
            'data' => new ContactListResource($contact)
        ]);

    }

    public function destroy($id)
    {
        $contact = ContactList::find($id);

        if (!$contact) {
            return response()->json(['error' => 'Contact not found'], 404);
        }

        $contact->delete();

        return response()->json([
            'message' => 'Contact deleted successfully',
            'data' => new ContactListResource($contact)
        ]);

    }
*/
}

