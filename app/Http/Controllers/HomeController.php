<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\event;
use App\Models\Inventory;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      
           $currentUserId = Auth::id();
        if(Auth::id())
        {
            
            $usertype=Auth()->user()->usertype;
            if($usertype=='user'){
                $currentUserId = Auth::id();
         
                return view('user.landing');
            }
            else if($usertype=='admin'){
                
                $incidentData = DB::table('services')
                ->leftJoin('events', 'services.id', '=', 'events.serviceId')
                ->select('services.name', DB::raw('COUNT(events.id) as count'))
                ->groupBy('services.name')
                ->get();
                           $incidentNames = $incidentData->pluck('name')->toArray();

                $accepted_recieved =event::where('status', 'Accepted')->count();
                $pending_recieved = event::where('status', 'Pending')
                        ->count();
                $declined_recieved = event::where('status', 'Declined')->count();
                $inventory= Inventory::all()->count();
                $service= Service::all()->count();
              
                $allrecieved = event::all()->count();

                $locationData = DB::table('events')
                ->join('users', 'events.userId', '=', 'users.id')
                ->select('users.name', DB::raw('COUNT(*) as count'))
                ->where('events.userId', $currentUserId)
                ->groupBy('users.name')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->get();
              
    
            $locationNames = $locationData->pluck('location')->toArray();
            $locationCounts = $locationData->pluck('count')->toArray();

                $monthlyAppointments = [];
                $events = DB::table('events')
                ->join('users', 'events.userid', '=', 'users.id')
                ->join('services', 'events.serviceId', '=', 'services.id')
                ->select(
                    'events.*',
                    'events.start',
                    'events.end',
                    'users.name as user_name',
                    'services.name as service_name'
                )
                ->get();
                foreach ($events as $event) {
                    $month = date('Y-m', strtotime($event->start));
                    if (!isset($monthlyAppointments[$month])) {
                        $monthlyAppointments[$month] = 0;
                    }
                    $monthlyAppointments[$month]++;
                }

                $data=User::select('id','created_at')->get()->groupBy(function($data){
                    return Carbon::parse($data->created_at)->format('M');
                });
        
                $months=[];
                $monthCount=[];
                foreach($data as $month => $values){
                    $months[]=$month;
                    $monthCount[]=count($values);
                }
                $userData = event::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->where('cancel', 0) // Add this condition to include only records where cancel is 0
                ->groupBy(DB::raw("MONTH(created_at)"))
                ->pluck('count');
                 $incidentCounts = $incidentData->pluck('count')->toArray();
                return view('admin.dashboard', ['data'=>$data,'months'=>$months,'monthCount'=>$monthCount, 'service'=>$service, 'inventory'=>$inventory, 'totalRecieved'=> $allrecieved,'pending_recieved'=>$pending_recieved, 'accepted_recieved'=>$accepted_recieved, 'declined_recieved'=>$declined_recieved, 'monthlyAppointments' => $monthlyAppointments, 'userData'=> $userData, 'incidentNames' => $incidentNames,'incidentCounts' => $incidentCounts]);        
            }
        }else{
            return view('user.landing');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
