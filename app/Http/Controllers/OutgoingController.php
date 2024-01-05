<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\User;
use App\Models\TransactionType;
use DB;
class OutgoingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $currentUserId = Auth::id();
           if(Auth::id()){
            $currentUserId = Auth::id();
            $user = User::where('id', $currentUserId)->get();
            $items = Inventory::where('userId', $currentUserId)->get();
            $type = TransactionType::all();
            $usertype=Auth()->user()->usertype;
      
            $transactions = Transaction::select('transactions.*', 'inventories.name as inventory_name', 'transaction_types.type as transaction_type')
            ->join('inventories', 'transactions.ItemId', '=', 'inventories.id')
            ->join('transaction_types', 'transactions.transactionTypeId', '=', 'transaction_types.id')
            ->get();
        
        
                  return view('admin/inventory/outgoing', ['transactions' => $transactions, 'types'=>$type, 'items' =>$items, 'users' =>$user, 'trans'=> $type]);
     
          
     }}
    
    public function download($filename) {
            $filePath = 'uploads/memo/' . $filename;
        return response()->download($filePath, $filename);
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
        //
        
               $itemID = $request->input('ItemId');
               $tranID = $request->input('transactionTypeId');
               $date= $request->input('transaction_date');
               $quan= $request->input('quantity');
      
        $validatedData = $request->validate([
            'ItemId' => 'required',
            'transactionTypeId' => 'required',
            'transaction_date' => 'required|date',
            'quantity' => 'required|integer',
            'description' => 'nullable|string|max:100',
    
        ]);

        // Get the authenticated user's ID
        $currentUserId = Auth::id();

        // Fetch the inventory's current quantity
        $inventory = Inventory::find($itemID);
        $currentQuantity = $inventory->current_quantity;
        $itemName = $inventory->name;
        // Compare the submitted quantity with the current quantity
        if ($validatedData['quantity'] > $currentQuantity) {

             return redirect()->back()->with('error', __('The current quantity of :item is :quantity. You cannot insert in outgoing product because you exceed the current quantity.', ['item' => $itemName, 'quantity' => $currentQuantity]))->withInput($request->all());
        } else{
               // Create a new Transaction instance and fill it with the validated data
        // Create a new Transaction instance and fill it with the validated data
            $transaction = new Transaction($validatedData);

            // Set the userId attribute to the current user's ID
            

            // Save the transaction to the database
            $transaction->save();

            // Update the current_quantity of the corresponding Inventory model
            $inventory->current_quantity -= $validatedData['quantity'];
            $inventory->save();

            return redirect()->back();
        }

    
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
        $record = Transaction::join('inventories', 'inventories.id', '=', 'transactions.ItemId')
                ->join('transaction_types', 'transaction_types.id', '=', 'transactions.transactionTypeId')
                ->select('transactions.*', 'transaction_types.type as type', 'inventories.name as inv_name', 'transaction_types.type as tran_type')
                ->findOrFail($id);

            return response()->json($record);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }


        return response()->json($record);
    }


    public function update(Request $request)
    {
        //
  
        
           $validatedData = $request->validate([
          
            'transdate' => 'date',
            'desc' => 'nullable|string|max:100',
            'purpose-label' => 'nullable|string|max:100',
        ]);
        $transid=$request->input('transid');
       
        $id=$request->input('id');
   
        $now= date('Y-m-d H:i:s');
        $item= $request->input('ItemId');
        $type=$request->input('transType');
        $date=$request->input('transdate');
        $desc=$request->input('desc');
        $purpose=$request->input('purpose-label');
        
            DB::table('transactions')
                ->where('id', $transid)
                ->update([
                   
                    'transaction_date' => $date,
                    'description'=> $desc,
                 
                    'updated_at' => $now,
                  
                ]);
        return redirect()->back()->with('success', 'Record Status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
           $request = Transaction::find($id);
 
        $request->delete();
        return redirect()->back();
    }

     public function filter(Request $request)
    {
        //
        $currentUserId = Auth::id();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $role = Auth()->user()->usertype;
        if ($role === 'pdrrmo') {
            
            $currentUserId = Auth::id();
            $user = User::where('id', $currentUserId)->get();
            $unreadNotificationCount = auth()->user()->unreadNotifications->count();
            $requests = Transaction::select('transactions.*', 'inventories.name as inventory_name')
                                ->join('inventories', 'transactions.ItemId', '=', 'inventories.id')
                                ->where('transactions.userId', $currentUserId)
                                ->get();
            return view('pdrrmo.assistanceRequest', ['transactions' => $transactions, 'items' =>$items, 'unread'=>$unreadNotificationCount,'users' =>$user]);
        } elseif ($role === 'mdrrmo') {
              $items = Inventory::where('userId', $currentUserId)->get();
            $transactions = Transaction::select('transactions.*', 'inventories.name as inventory_name')
                                ->join('inventories', 'transactions.ItemId', '=', 'inventories.id')
                                ->where('transactions.userId', $currentUserId)->whereBetween('transactions.created_at', [$start_date, $end_date])->get();
            return view('mdrrmo/Inventory/Outgoing-inventory', ['transactions' => $transactions, 'items' =>$items ]);
        }
    }
}
