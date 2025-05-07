<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdvertisementType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisementTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adTypes=AdvertisementType::all();
        return view('dashboard.advertisement.advertisementTypes',compact('adTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
        ]);

        $adtype = new AdvertisementType();
        $adtype->type = $request->type;
        $adtype->save();

        return redirect()->route('adTypes.index')->with('success', 'Type created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $adtype = AdvertisementType::findOrFail($id);
        $adtype->update([
            'type' => $request->input('type')
        ]);

        return redirect()->back()->with('success', 'Advertisement Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $adtype = AdvertisementType::findOrFail($id);
        $adtype->delete();

        return redirect()->route('adTypes.index')->with('success', 'Category deleted successfully!');
    }
}
