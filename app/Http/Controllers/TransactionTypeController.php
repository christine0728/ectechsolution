<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usertype=Auth()->user()->usertype;
        $currentUserId = Auth::id();
       
           $types= TransactionType::all();
            return view('admin.inventory.transaction', ['types'=>$types]);
      
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
 


        $rules = [
            'type' => 'required|max:255',
            'desc' => 'max:400'
        ];

        $customeError = [
            'required' => 'Fill in the textbox',
            'max' => 'The :attribute field cannot be longer than :max characters.',
        ];
         $currentDate = now();
        $this->validate($request, $rules, $customeError);
        $userID = Auth::id();
        $type= $request->input('type');
        $desc = $request->input('desc');
        if ($desc === null) {
        $desc = 'None'; 
        }
        DB::insert('insert into transaction_types(userid, type, description,created_at, updated_at) values (?, ?, ?, ?, ?)', [$userID, $type, $desc, $currentDate, $currentDate]);

        return redirect()->back()->with('success', 'Transaction type added successfully.');
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
            $record = TransactionType::findOrFail($id);
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
        $rules = [
            'trans-type' => 'required|max:255',
            'trans-desc' => 'max:400'
        ];

        $customeError = [
            'required' => 'Fill in the textbox',
            'max' => 'The :attribute field cannot be longer than :max characters.',
        ];
        $this->validate($request, $rules, $customeError);
        $id=$request->input('id');
        $type= $request->input('trans-type');
        $desc = $request->input('trans-desc');
        $now= date('Y-m-d H:i:s');
         DB::table('transaction_types')
        ->where('id', $id)
        ->update([
            'type' => $type,
            'description' =>  $desc !== null ? $desc : 'None', 
            'updated_at' => $now,
        ]);
        return redirect()->back()->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = TransactionType::find($id);
        $request->delete();
        return redirect()->back();
        //
    }
}
