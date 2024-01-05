<?php

namespace App\Http\Controllers;
use App\Notifications\AppointmentNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\Promo;
use App\Models\Service;
use Carbon\Carbon;
use App\Models\event;
use App\Models\limit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AssistanceRequest;
use DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
       public function calendar(){
       
                $currentUserId = Auth::id();
                $usertype=Auth()->user()->usertype;
                if ($usertype === 'user') {
                    //$unreadNotificationCount = auth()->user()->unreadNotifications->count();
                     $currentUserId = Auth::id();
                    $user = User::where('id', $currentUserId)->get();
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
                    $promo = Promo::where('end_date', '>', now())
                    ->whereNotIn('id', [5])
                    ->get();
     
                     $service= Service::all();
                    $currentUserId = Auth::id(); 
                    return view('user.appointment', ['services'=> $service, 'promos'=>$promo, 'currentUserId' => $currentUserId, 'events'=>$events, 'users' =>$user]);
               }      
    }


public function getEvents(Request $request)
{
    $searchQuery = $request->input('searchQuery');

    // Query the events based on the searchQuery
    $filteredEvents = event::where('title', 'like', '%' . $searchQuery . '%')
        ->orWhere('description', 'like', '%' . $searchQuery . '%')
        ->get();

    // Return the filtered events as JSON
    return response()->json($filteredEvents);
}

    public function events(){
           $usertype=Auth()->user()->usertype;
            if($usertype=='mdrrmo'){
                  $events= event::select('events.*', 'users.name as municipality_name')
            ->join('users', 'events.userid', '=', 'users.id')->get();
                return view('mdrrmo.ScheduleTable', ['events'=>$events]);
            }
            else if($usertype=='pdrrmo'){
                $events = event::all();
                return view('pdrrmo.ScheduleTable', ['events'=>$events]);
            }
           else {
            return redirect()->back();
            }
         
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        $sched = event::where('title', 'like', '%' . $searchTerm . '%')->get();
               $currentUserId = Auth::id();
                    $user = User::where('id', $currentUserId)->get();
                    $events = event::all();
                    $currentUserId = Auth::id(); 
           return view('mdrrmo.Scheduling', ['currentUserId' => $currentUserId, 'events'=>$events, 'scheds'=>$sched, 'users' =>$user]);
    }
    public function modify(Request $request){

         $id=$request->input('event-id');
         $event= $request->input('event-Title');
     
           $event = event::findOrFail($id);

        $event->title = $request->input('event-Title');
        $event->description = $request->input('event-Description');
        $event->involved = $request->input('involveds');
        $event->start_time = $request->input('event-Start');
        $event->end_time = $request->input('event-End');
        $event->location = $request->input('locations');
        $event->involved= 'pdrrmo';
        $event->save();
        return redirect()->back()->with('success', 'Record updated successfully!');
    }
    /**
     * Show the form for creating a new resource.
     */
     public function update(Request $request)
        {
            $id=$request->input('eventId');
            $event = event::findOrFail($id);
            $desc = $request->input('event-Description');
            $event->description = $request->input('event-Description');
            $username=Auth()->user()->name;
            // Check if the current user's name is already a participant
            $username = Auth()->user()->name;
            // Encode the updated or new participants array back to JSON
            $event->start_time = $request->input('event-Start');
            // $event->involved= 'Mdrrmo';
            $event->save();

            // Optionally, you can return a response or redirect
            // For example, you can return a JSON response:
        return redirect()->back()->with('success', 'Record updated successfully!');
        }

     public function details($id)
        {
            $events = event::findOrFail($id);
            $event = event::select('events.*', 'users.name as municipality_name', 'services.name as service_name','services.duration as duration' )
            ->join('users', 'events.userid', '=', 'users.id')
            ->join('services', 'events.serviceId', '=', 'services.id')
            ->where('events.id', '=', $id)
            ->first();
        


            
            $currentUserId = Auth::id();

            $responseData = [
                'event' => $event,
                'currentUserId' => $currentUserId,
            ];

return response()->json($responseData);

        }

    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'start', 'end']);
  
             return response()->json($data);
        }
  
        return view('welcome');
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
      
         $currentUserId = Auth::id();
        switch ($request->type) {
           case 'add':
            $currentDate = Carbon::now()->setTimezone('Asia/Manila');
            $formattedDateTime = $currentDate->format('Y-m-d h:i');
            $startDateTime = Carbon::parse($request->start);
            $limit = limit::first();
            $limitedValue = $limit->limited;
           
            $currentUserName = auth()->user()->name;
            if ($startDateTime->isToday() || $startDateTime->isFuture()) {
                // Check if there are already 10 events with the same start date
                $eventsCount = Event::where('start', $request->start)->count();
            
                if ($eventsCount < $limitedValue) {
                    // Create the event
                    $event = Event::create([
                        'serviceid' => $request->service,
                        'promoId' => $request->promo ?? 5,
                        'userid' => $currentUserId,
                        'location' => $request->location,
                        'start' => $request->start,
                        'end' => $request->end,
                        'start_time' => $request->timeStart,
                        'end_time' => $request->timeEnd,
                        'description' => $request->description,
                        'created_at' => now(),
                        'updated at' => now(),
                    ]);
                    $newid = $event->id;
                    $notifiableUser = User::where('name', 'admin')->first();
            
                    if ($notifiableUser) {
                        // Notify admin
                        Notification::send($notifiableUser, new AppointmentNotification($newid, $currentUserName, 'is requesting an appointment'));
                        return response()->json([$event]);
                    } else {
                        return response()->json($event);
                    }
                } else {
                    return response()->json(['limit' => "Maximum limit reached for appointment on this date. Limit is $limitedValue"]);

                }
            } else {
                return response()->json(['error' => 'Invalid date format or other issue.']);
            }
            
             break;
  
           case 'update':
              $event = event::find($request->id)->update([
                  'title' => $request->title,
                  'description' => $request->description,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
    public function cancel(string $id)
    {
        //
   
        $event = event::find($id);

        // Check if the event is found
        if ($event) {
            // Update the 'cancel' column to 1
            $event->update(['cancel' => 1]);
            $event->update(['status' => 'canceled']);
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Event canceled successfully.');
        } else {
            // Redirect back with an error message if the event is not found
            return redirect()->back()->with('error', 'Event not found.');
        }


    }
    public function paid(string $id)
    {
        //
   
        $event = event::find($id);

        // Check if the event is found
        if ($event) {
            // Update the 'cancel' column to 1
            $event->update(['paid' => 1]);
           
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Event paid successfully.');
        } else {
            // Redirect back with an error message if the event is not found
            return redirect()->back()->with('error', 'Appointment not found.');
        }


    }
    
}
