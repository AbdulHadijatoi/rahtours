<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\CancelBooking;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller {

    public function index(Request $request) {
        $user = Auth::user();

        
        // Paginate the results, showing the last 10 records
        $perPage = $request->input('perPage', 10); // Default to 10 if perPage is not provided
        $currentPage = $request->input('page', 1); // Default to 1 if page is not provided
        
        // Get the bookings, order by date descending to get the latest records
        $bookings = Order::where('user_id', $user->id)
                          ->orderBy('id', 'desc')
                          ->paginate($perPage, ['*'], 'page', $currentPage);
        
        return view('pages.bookings', compact('bookings'));
    }
    
    
    public function getBooking($id) {
        $booking = Order::find($id);

        return response()->json([
            "booking"=>$booking
        ],200);
    }

    public function updateBooking(Request $request,$id) {
        $order=Order::findOrFail($id);
        // dd($request->input());
        $order->date = $request->date?? $order->date;
        $order->save();
        // $order->update([
        //     'date'=>$request->date ?? $order->date,
        // ]);
        return response()->json(['message'=>"Booking updated successfully!"]);
    }

    public function cancelBooking($id) {
        try{

            $order=Order::findOrFail($id);
            $orderItem=$order->orderItems->first();
            $package=$orderItem->package;
            $activity=$package->activity;
            $duration=$activity->cancellation_duration;
            $createdAt = Carbon::parse($order->created_at);
            $currentDate = now();
            $hoursDifference = $createdAt->diffInHours($currentDate);
            
            if($hoursDifference <= $duration) {
                $order->update([
                    'status'=>"canceled",
                ]);
                $adminEmail = User::where('id', 1)->pluck('email')->first();

                Mail::to($order->email)->send(new CancelBooking($order));
                Mail::to($adminEmail)->send(new CancelBooking( $order));
                return response()->json([
                    'status' => true,
                    'message' => "Booking Canceled successfully!"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "You can not cancel booking!"
                ],422);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => "Something went wrong, please contact support!"
            ],422);   
        }

    }
    
}