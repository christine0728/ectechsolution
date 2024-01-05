<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\inventory;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
           $currentUserId = Auth::id();
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            if($usertype=='admin'){
                    $currentUserId = Auth::id();
                  
                    $suppliers = Supplier::all();
                    $categories = Category::all();
                     $inventory = DB::table('inventories')
                    ->join('categories', 'inventories.catid', '=', 'categories.id')
                    ->join('suppliers', 'inventories.supplier_id', '=', 'suppliers.id')
                    ->select(
                        'inventories.*', // Select all columns from the inventories table
                        'categories.name as category_name',
                        'suppliers.name as supplier_name'
                    )
                     ->where('inventories.userid', $currentUserId)->get();
                    $currentUserId = Auth::id();
                    $user = User::where('id', $currentUserId)->get();
                    
                return view('admin.inventory.Inventory', ['users' =>$user, 'inventory' => $inventory, 'categories' => $categories, 'suppliers'=>$suppliers]);
            }
            else if($usertype=='user'){
                    $unreadNotificationCount = auth()->user()->unreadNotifications->count();
                    $suppliers = Supplier::where('userid', $currentUserId)->get();
                    $categories = Category::where('userid', $currentUserId)->get();
                    $currentUserId = Auth::id();
                     $inventory = DB::table('inventories')
                    ->join('categories', 'inventories.catid', '=', 'categories.id')
                    ->join('suppliers', 'inventories.supplier_id', '=', 'suppliers.id')
                    ->select(
                        'inventories.*', // Select all columns from the inventories table
                        'categories.name as category_name',
                        'suppliers.name as supplier_name'
                    )
                     ->where('inventories.userid', $currentUserId)->get();
                    $currentUserId = Auth::id();
                    $user = User::where('id', $currentUserId)->get();
                return view('nventory.Inventory', ['users' =>$user, 'unread'=>$unreadNotificationCount, 'inventory' => $inventory, 'categories' => $categories, 'suppliers'=>$suppliers]);
              
                    
            }
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function add(Request $request)
    {
        //
        $id= $request->input('item-id');
        $quan= $request->input('quantity-add');
      
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formattedDateTime = $now->format('Y-m-d H:i:s');
        $inventory = inventory::find($id);
        $inventory->current_quantity += $quan;
        $inventory->item_updated =$formattedDateTime;
        $inventory->update();
    return redirect()->back()->with('success', 'Record updated successfully!');
     
        
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $rules=[

            'item-name' => 'required',
            'item_desc' => 'required',
            'category' => 'required',
            'supplier' => 'required', 
            'quantity' => 'required|integer|min:0',
            'location' => 'required',
        ];
                $customeError= [
            'item-name.required' => 'The item name is required.',
            'item_desc.required' => 'The item description is required.',
            'category.required' => 'Please select a category.',
            'supplier.required' => 'Please select a supplier.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least :min.',
            'location.required' => 'The location is required.',
        ];
        
         $this->validate($request, $rules, $customeError);
              $currentDate = now();
            $currentUserId = Auth::id();
            $inventory = new Inventory;
            $category = $request->input('category');
            $supplier = $request->input('supplier');
            $itemName = $request->input('item-name');
            $quantity = $request->input('quantity');
            $itemDesc = $request->input('item_desc');
            $quantity = $request->input('quantity');
            $location = $request->input('location');
            $image=$request->input('image');
            $existingInventory = Inventory::where('name', $itemName)->where('userId', $currentUserId)->first();

            if ($existingInventory) {
               
                    $existingInventory->current_quantity += $quantity;
                    $existingInventory->save();  
                } 
                else {
                if($request->hasfile('image'))
                {
                    $file = $request->file('image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extenstion;
                    $file->move('uploads/inventory/', $filename);
                    $inventory->image = $filename;
                       DB::insert('insert into inventories(userId, supplier_id, catid, name, description, current_quantity, image, location, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$currentUserId, $supplier, $category, $itemName, $itemDesc, $quantity, $filename, $location, $currentDate, $currentDate]);
                  return redirect()->back()->with('message', 'Post added!');
                            } else {
                               DB::insert('insert into inventories(userId, supplier_id, catid, name, description, current_quantity, location, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$currentUserId, $supplier, $category, $itemName, $itemDesc, $quantity, $location, $currentDate, $currentDate]);
                  return redirect()->back()->with('message', 'Post added!');
            
                   }
                }
          return redirect()->back()->with('message', 'Item added succesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function download($filename) {
            $filePath = 'uploads/inventory/' . $filename;
        return response()->download($filePath, $filename);
    }
    
    public function mdrrmo()
    {
        //
                    $notifications = auth()->user()->unreadNotifications;
                    $currentUserId = Auth::id();
                    $user = User::where('id', $currentUserId)->get();
                    $unreadNotificationCount = auth()->user()->unreadNotifications->count();

                    $suppliers = Supplier::all();
                    $categories = Category::all();
                    $currentUserId = Auth::id();
                     $inventory = DB::table('inventories')
                    ->join('categories', 'inventories.catid', '=', 'categories.id')
                    ->join('suppliers', 'inventories.supplier_id', '=', 'suppliers.id')
                    ->join('users', 'inventories.userid', '=', 'users.id')
                    ->select(
                        'users.*',
                        'inventories.*', // Select all columns from the inventories table
                        'categories.name as category_name',
                        'suppliers.name as supplier_name'
                    )
                    ->where('users.usertype', 'mdrrmo') 
                    ->get();
                 $mdrrmoUsers = User::where('usertype', 'mdrrmo')->orderBy('name') ->get();
                     return view('pdrrmo.Inventory.MdrrmoInventory', ['unread'=>$unreadNotificationCount, 'notifications' => $notifications, 'users' =>$user, 'mdrrmoUsers' => $mdrrmoUsers, 'inventory' => $inventory, 'categories' => $categories, 'suppliers'=>$suppliers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function municipality(Request $request){
                    $currentUserId = Auth::id();
                    $user = User::where('id', $currentUserId)->get();
                    $selectedMunicipalityId = $request->input('municipality');
                    $unreadNotificationCount = auth()->user()->unreadNotifications->count();
                    $suppliers = Supplier::all();
                    $categories = Category::all();
                    $inventory = DB::table('inventories')
                    ->join('categories', 'inventories.catid', '=', 'categories.id')
                    ->join('suppliers', 'inventories.supplier_id', '=', 'suppliers.id')
                    ->join('users', 'inventories.userid', '=', 'users.id')
                    ->select(
                        'users.*',
                        'inventories.*', // Select all columns from the inventories table
                        'categories.name as category_name',
                        'suppliers.name as supplier_name'
                    )
                    ->where('users.id', $selectedMunicipalityId)
                    ->get();
                     $notifications = auth()->user()->unreadNotifications;
                 $mdrrmoUsers = User::where('usertype', 'mdrrmo')->get();
                     return view('pdrrmo.Inventory.MdrrmoInventory', ['mdrrmoUsers' => $mdrrmoUsers, 'unread'=>$unreadNotificationCount,'users' =>$user,'inventory' => $inventory, 'categories' => $categories, 'suppliers'=>$suppliers,  'notifications' => $notifications,]);
    }
        public function AllInventory(Request $request){
        $currentUserId = Auth::id();
        $incident= Covered_incident::all();
        $selectedMunicipalityId = $request->input('municipality');
        $selectedMuni = User::where('id', $selectedMunicipalityId )->first();
        $selectedmunicipality= $selectedMuni->name;
        $mdrrmoUsers = User::where('id', '!=', $currentUserId)->get();
        $categories = category::all();
        $user = User::where('id', $currentUserId)->get();
        $inventory = DB::table('inventories')
        ->join('categories', 'inventories.catid', '=', 'categories.id')
        ->join('suppliers', 'inventories.supplier_id', '=', 'suppliers.id')
        ->join('users', 'inventories.userid', '=', 'users.id') // Assuming there's a user_id column in the inventories table
         ->where('inventories.userid', $selectedMunicipalityId) 
        ->select(
        'inventories.*', // Select all columns from the inventories table
        'categories.name as category_name',
        'suppliers.name as supplier_name'
    )->get();

         $unreadNotificationCount = auth()->user()->unreadNotifications->count();
       return view('mdrrmo/requestInventory', ['inventory' => $inventory, 'incidents'=> $incident, 'selectedmunicipality' => $selectedmunicipality, 'municipalityId'=> $selectedMunicipalityId, 'mdrrmoUsers' => $mdrrmoUsers, 'categories' => $categories, 'users' =>$user, 'unread'=>$unreadNotificationCount]);


    }
    public function edit(string $id)
    {
        //
      try {
        $record = Inventory::join('categories', 'inventories.catid', '=', 'categories.id')
            ->join('suppliers', 'inventories.supplier_id', '=', 'suppliers.id')
            ->select('inventories.*', 'categories.name as category_name', 'suppliers.name as supplier_name')
            ->findOrFail($id);

        return response()->json($record);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'Record not found'], 404);
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
     
            $id= $request->input('itemid');
         
            $inventory = inventory::find($id);
            $inventory->name = $request->input('item-name');
            $inventory->supplier_id = $request->input('supplier');
            $inventory->catid = $request->input('category');
            $inventory->description = $request->input('itemdesc');
            $inventory->current_quantity = $request->input('quan');
            $inventory->location = $request->input('location');
    
           if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/inventory/', $filename);
                $inventory->image = $filename;
                
            }
        $inventory->update();
        return redirect()->back()->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $request = inventory::find($id);
        $request->delete();
       return redirect()->back();
    }
}
