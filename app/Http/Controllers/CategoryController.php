<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class CategoryController extends Controller
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
                $user = User::where('id', $currentUserId)->get();
                $categories = Category::all();
                return view('admin.inventory.category', ['categories'=>$categories, 'users' =>$user]);
            }
            else if($usertype=='pdrrmo'){
                  $unreadNotificationCount = auth()->user()->unreadNotifications->count();

                $currentUserId = Auth::id();
                $user = User::where('id', $currentUserId)->get();
                $notifications = auth()->user()->unreadNotifications;
                $categories = Category::where('userid', $currentUserId)->get();
                return view('pdrrmo.Inventory.Category', ['categories'=>$categories, 'notifications' => $notifications, 
                'users' =>$user, 'unread'=>$unreadNotificationCount]); }
            }

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
        $rules = [
            'cat-name' => 'required',
        ];

        $customeError = [
            'required' => 'Fill in the textbox'
        ];
        $userID = Auth::id();
        $name = $request->input('cat-name');
       
         $currentDate = now();
        $this->validate($request, $rules, $customeError);
        DB::insert('insert into categories( name, created_at, updated_at) values ( ?, ?, ?)', [ $name, $currentDate, $currentDate]);
        return redirect()->back()->with('message', 'Category Added!');
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
            $record = Category::findOrFail($id);
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
            $name = $request->input('cat-name');
            $id= $request->input('catid');
           
            DB::table('categories')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                ]);
        return redirect()->back()->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
           $request = category::find($id);
        $request->delete();
       return redirect()->back();
    }
}
