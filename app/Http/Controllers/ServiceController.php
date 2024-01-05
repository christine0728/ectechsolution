<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\Promo;
use DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $currentUserId = Auth::id();
        $service= Service::all();
        $promo = Promo::where('end_date', '>', now())
        ->whereNotIn('id', [5])
        ->get();

        if(Auth::id())
        {
           
            $usertype=Auth()->user()->usertype;
            if($usertype=='user'){
                $currentUserId = Auth::id();
                $service= Service::all();
                return view('user.service', ['services' => $service, 'promos'=> $promo]);
            }
            else if($usertype=='admin'){
                $service= Service::all();
                return view('admin.service', ['services' => $service]);      
            }
        }else{
            return view('user.services', ['services' => $service, 'promos'=> $promo]);
        }

    }

    public function about()
    {
        //
        return view('user.about');
    }
    public function info($id)
    {
        //
        try {
            $record = Service::findOrFail($id);
            return response()->json($record);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($record);
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
            'name' => 'required|max:255',
            'desc'=> 'max:250',
            'price'=> 'max:100',
            'duration' => 'max:255',
           
        ];


        $customeError = [
            'required' => 'Fill in the textbox',
            'max' => 'The :attribute field cannot be longer than :max characters.',
        ];

        $userID = Auth::id();
        $name = $request->input('name');
        $image=$request->input('image');

        $price = $request->input('price');
        $desc = $request->input('desc');
        $duration = $request->input('duration');
     
        $currentDate = Carbon::now();
   
        $this->validate($request, $rules, $customeError);
        
        if($request->hasfile('image'))
        {
      
            $service = new Service;
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/inventory/', $filename);
            $service->image = $filename;
            DB::insert('insert into services(name, description, price, image, duration, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)', [$name,$desc, $price, $filename, $duration, $currentDate, $currentDate]);
            return redirect('/admin/service')->with('message', 'Successfully inserted!');
            
          return redirect()->back()->with('message', 'Post added!');
                    } else {
                        DB::insert('insert into services(name, description, price, image, duration, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)', [$name,$desc, $price, NULL, $duration, $currentDate, $currentDate]);
                        return redirect('/admin/service')->with('message', 'Successfully inserted!');
                        
    
           }
      //
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
            $record = Service::findOrFail($id);
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
        $id= $request->input('serviceId');
            // Validate the incoming request data
    $request->validate([
        'serviceName' => 'required|string|max:255',
        'descservice' => 'required|string',
        'priceservice' => 'required|numeric',
        'durationservice' => 'required|string',
    ]);

    // Find the Service model instance by ID
    $service = Service::findOrFail($id);

    // Update the model with the validated data
    $service->update([
        'name' => $request->input('serviceName'),
        'description' => $request->input('descservice'),
        'price' => $request->input('priceservice'),
        'duration' => $request->input('durationservice'),
        // Add other fields as needed
    ]);

    return redirect()->back()->with('success', 'Inserted successfully!');
    }
    public function view(string $id)
    {
        //
        try {
            $record = Service::findOrFail($id);
            return response()->json($record);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($record);
    }
    public function more(string $id)
    {
        //
        try {
            $record = Service::findOrFail($id);
            return response()->json($record);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($record);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
     
        $request = Service::find($id);
        $request->delete();
       return redirect()->back();
    }
}
