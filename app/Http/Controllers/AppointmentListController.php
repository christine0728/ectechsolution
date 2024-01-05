<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\UpdateAppointmentNotification;
use Illuminate\Support\Facades\Notification;
use DB;
use App\Models\limit;
use App\Models\Promo;
use App\Models\User;
use App\Models\event;
class AppointmentListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $limit = limit::first();
        $limitedValue = $limit->limited;
        $appointments = Event::select(
            'events.id',
            'events.userid',
            'events.serviceId',
            'events.promoId',
            'events.*',
            'services.price as prices',
            'events.created_at as date_created',
            'events.start as date_appointment',
            'users.name as user_name',
            'services.name as service_name',
            'promos.title as promo_name',
            'promos.discount_percentage as discount',
            \DB::raw('(services.price - (services.price * COALESCE(promos.discount_percentage, 0) / 100)) as discounted_amount') // Calculate discounted amount
        )
            ->join('users', 'events.userid', '=', 'users.id')
            ->join('services', 'events.serviceId', '=', 'services.id')
            ->leftJoin('promos', 'events.promoId', '=', 'promos.id')
            ->orderBy('events.id', 'desc') 
            ->get();
            $income = Event::select(
                \DB::raw('SUM(CASE WHEN events.paid = 1 THEN (services.price - (services.price * COALESCE(promos.discount_percentage, 0) / 100)) ELSE 0 END) as total_income')
            )
            ->join('users', 'events.userid', '=', 'users.id')
            ->join('services', 'events.serviceId', '=', 'services.id')
            ->leftJoin('promos', 'events.promoId', '=', 'promos.id')
            ->where('events.paid', '=', 1) // Filter for paid records
            ->get();
        
        // Access the total_income value
        $totalIncome = $income[0]->total_income;
        return view('admin.appointment-list', ['totalIncome'=>$totalIncome,'limit' => $limitedValue,'appointments' => $appointments, 'start_date' => ""]);
        
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
      try {
        $record = event::select(
            'events.id as eventid',
            'events.userid',
            'events.serviceId',
            'events.*',
            'services.*',
            'events.created_at as date_created',
            'events.start as date_appointment',
            'users.name as user_name',
            'services.name as service_name'
        )
        ->join('users', 'events.userid', '=', 'users.id')
        ->join('services', 'events.serviceId', '=', 'services.id')->findOrFail($id);

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
        //
        $appointid = $request->input('id-appoint'); 
        $userId = $request->input('userId');   
    
        //$notifiableUser = User::find($userid);
        $status = $request->input('status');
        $comment = $request->input('comment');
        $event = event::where('id', $appointid)->first();
        if ($event && $event->status === 'accepted') {
                
         return redirect()->back()->with('accepted', 'Record is already Accepted!');
        }
        if ($event && $event->status === 'declined') {
                
         return redirect()->back()->with('accepted', 'Record is already Declined!');
        }
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $event = Event::find($appointid);
         $event->comment = $comment;
    $event->status = $status;
    $event->status_updated = $now;

    $event->save(); // This will update the existing record

    $newlyInsertedId = $event->id;
    
        $currentUserName = auth()->user()->name;
        $notifiableUser = User::find($userId);
        $admins = User::where('usertype', 'admin')->get(); 
        Notification::send($notifiableUser, new UpdateAppointmentNotification($newlyInsertedId, $status, $currentUserName, 'has responded to your appointment'));
        return redirect()->back()->with('success', 'Record Status updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function history()
    {
        //
        $currentUserId = Auth::id();
        $appointments = event::select(
            'events.id',
            'events.userid',
            'events.serviceId',
            'events.*',
            'services.price as prices',
            'events.created_at as date_created',
            'events.start as date_appointment',
            'users.name as user_name',
            'services.name as service_name'
        )
        ->join('users', 'events.userid', '=', 'users.id')
        ->join('services', 'events.serviceId', '=', 'services.id')
        ->orderBy('events.id', 'desc') 
        ->where('events.userid', '=', $currentUserId)
        ->get();
        
        return view('user.appointment_history', ['appointments' => $appointments]);
        

    }
    public function read($notificationId)
    {
        //
        
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
 
        // Mark the notification as read
        $notification->markAsRead();

        
        return redirect('/admin/appointment-list');
    }
    public function respond($notificationId)
    {
        //
        
        
        $username=Auth()->user()->name;
        $currentUserId = Auth::id();
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();
        
        // Assuming the 'id' key exists in the 'data' array of the notification
        $notificationDataId = $notification->data['id'];
 
        
        return redirect('/user/appointment-history')->with('notificationId',$notificationDataId);
    }
    public function filter(Request $request)
    {
        //
        $currentUserId = Auth::id();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $role = Auth()->user()->usertype; 
        $appointments = Event::select(
            'events.id',
            'events.userid',
            'events.serviceId',
            'events.promoId',
            'events.*',
            'events.created_at as date_created',
            'events.start as date_appointment',
            'users.name as user_name',
            'services.name as service_name',
            'promos.title as promo_name', // Add the promo name to the select
            'promos.discount_percentage as discount' // Add the discount percentage to the select
        )
        ->join('users', 'events.userid', '=', 'users.id')
        ->join('services', 'events.serviceId', '=', 'services.id')
        ->leftJoin('promos', 'events.promoId', '=', 'promos.id') // Left join with promos table
        ->whereBetween('events.created_at', [$start_date, $end_date]) // Add whereBetween condition
        ->get();
        session(['start_date' => $start_date, 'end_date' => $end_date]);
        return redirect('/admin/appointment-list')->with(['appointments' => $appointments, 'start_date' => $start_date, 'end_date' => $end_date]);

    }
    public function destroy(string $id)
    {
        //

    }
    public function mark($notificationId)
    {
        //
        
        $username=Auth()->user()->name;
        $currentUserId = Auth::id();
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();
        
        // Assuming the 'id' key exists in the 'data' array of the notification
        $notificationDataId = $notification->data['id'];
 
        return redirect('/admin/appointment-list')->with('notificationId',$notificationDataId);
        
    }
    

    public function limit(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $id= $request->input('limit');
        DB::table('limits')
        ->update([
            'limited' => $id,
            'updated_at' =>$now,
        ]);
       
        return redirect()->back()->with('success', 'Limit per day updated');

    }
    public function  past()
    {
        //
        $currentUserId = Auth::id();
        $appointments = Event::select(
            'events.id',
            'events.userid',
            'events.serviceId',
            'events.promoId',
            'events.*',
            'events.created_at as date_created',
            'events.start as date_appointment',
            'users.name as user_name',
            'services.name as service_name',
            'promos.title as promo_name', // Add the promo name to the select
            'promos.discount_percentage as discount' // Add the discount percentage to the select
        )
            ->join('users', 'events.userid', '=', 'users.id')
            ->join('services', 'events.serviceId', '=', 'services.id')
            ->leftJoin('promos', 'events.promoId', '=', 'promos.id')
            ->where('events.start', '<', now())  // Left join with promos table
            ->get();
        return view('admin.past', ['appointments' => $appointments]);
    }
}
