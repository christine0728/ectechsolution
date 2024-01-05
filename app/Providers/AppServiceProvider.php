<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Get the currently logged-in user
            $user = Auth::user();
            $currentUserId = Auth::id();
            if ($user) {
                $persons = User::where('id', '!=', $currentUserId)->get();
                $unreadNotificationCount = auth()->user()->unreadNotifications->count();
                // Access the user's image
                $userImage = $user->image;
                $currentUserId = Auth::id();
            // $notifications = auth()->user()->notifications->sortByDesc('created_at')->groupBy('read_at')->reverse();
            $notifications = auth()->user()->notifications->sortByDesc('created_at');

            $unreadNotifications = $notifications->where('read_at', null);
            $readNotifications = $notifications->where('read_at', '!=', null);
            
            $notifications = $unreadNotifications->concat($readNotifications);
            
                $user = User::where('id', $currentUserId)->get();
                // Pass the user image to the view
                $memonotif=0;
                foreach (auth()->user()->unreadNotifications as $notification) {
                if ($notification->data['nameNotif'] === 'has send a file') {
                    $memonotif++;
                }
            }
                $view->with([
                    'users' => $user,
                    'unread' => $unreadNotificationCount,
                    'notifications' => $notifications,
                    'unreadmemo'=> $memonotif,
                    'persons'=>$persons
                ]);
            } else {
                // Handle the case where no user is logged in
            }
        });
    }
}
