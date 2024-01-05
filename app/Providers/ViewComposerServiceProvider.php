<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Check if a user is authenticated
            if (Auth::check()) {
                // Get the currently logged-in user
                $user = Auth::user();
                $currentUserId = Auth::id();

                $unreadNotificationCount = auth()->user()->unreadNotifications->count();
                
                // Access the user's image
                $userImage = $user->image;

                // $notifications = auth()->user()->notifications->sortByDesc('created_at')->groupBy('read_at')->reverse();
                $notifications = auth()->user()->notifications->sortByDesc('created_at');

                $unreadNotifications = $notifications->where('read_at', null);
                $readNotifications = $notifications->where('read_at', '!=', null);
                
                $notifications = $unreadNotifications->concat($readNotifications);
                
                $user = User::where('id', $currentUserId)->get();
                $currentUserName = Auth::check() ? Auth::user()->name : null;
                
                // Pass the user image to the view
                $view->with([
                    'username' => $currentUserName,
                    'users' => $user,
                    'unread' => $unreadNotificationCount,
                    'notifications' => $notifications,
                ]);
            } else {
                // Handle the case where no user is logged in
                $view->with([
                    'users' => null,
                    'unread' => 0,
                    'notifications' => [],
                ]);
            }
        });
    }
}
