<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use DB;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $promo = Promo::where('id', '!=', 5)->get();

        return view('admin.promo', ['promos' => $promo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function readpromo(string $id)
    {
        //
        try {
            $record = Promo::findOrFail($id);
            return response()->json($record);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($record);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'promo-name' => 'required|string|max:255',
            'description' => 'required|string',
            'end-date' => 'required|date',
            'discount' => 'required|numeric|between:0,100',
        ]);
      
        // Create a new Promo instance and fill it with the form data
        $promo = new Promo([
            'title' => $request->input('promo-name'),
            'description' => $request->input('description'),
            'end_date' => $request->input('end-date'),
            'discount_percentage' => $request->input('discount'),
            // Add other fields as needed
        ]);

        // Save the Promo to the database
        $promo->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Promo added successfully');
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
        try {
            $record = Promo::findOrFail($id);
            return response()->json($record);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'promoName' => 'required|string|max:255',
            'promodesc' => 'required|string',
            'enddate' => 'required|date',
            'discountpromo' => 'required|numeric',
        ]);
    
            // Find the promo by ID
            $id = $request->input('promoId');
        
            DB::table('promos')
            ->where('id', $id)
            ->update([
                'title' => $request->input('promoName'),
                'description' => $request->input('promodesc'),
                'end_date' => $request->input('enddate'),
                'discount_percentage'=> $request->input('discountpromo')
            ]);
    return redirect()->back()->with('success', 'Record updated successfully!');

    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $request = Promo::find($id);
        $request->delete();
       return redirect()->back();
    }
}
