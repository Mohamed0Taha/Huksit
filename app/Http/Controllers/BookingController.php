<?php
namespace App\Http\Controllers;
use App\booking;
use App\service;
use Illuminate\Http\Request;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {
        //
    }
   public function ajax_url($service_id, $exec_date) {
        $bookings = Booking::where('service_id', $service_id)
        ->where('exec_date', $exec_date)->get();
         $service = Service::where('id', $service_id)->first();
         $from=(int)$service->av_from;
         $to=(int)$service->av_to;
        

        $removeableBooking=array();
        $removeableTotal=array();
        $booked=array();
        $available_labled=array();
         foreach ($bookings as $booking) {
           $obj = new \stdClass();
           $obj->label="booked";
           $obj->data=$booking->exec_time;
           $obj->rank= substr($booking->exec_time, 0, -3);
            array_push($booked,$obj);
        }
      
         foreach ($bookings as $booking) {
           
           array_push($removeableBooking,$booking->exec_time);
       }

     
        for ($x = $from; $x < $to; $x++) {
            array_push($removeableTotal,$x.':00');
            }
        
        $available = array_diff($removeableTotal, $removeableBooking);
         foreach ($available as $time) {
           $obj = new \stdClass();
           $obj->label="available";
           $obj->data=$time;
            $obj->rank= substr($time, 0, -3);
           array_push($available_labled,$obj);
          
        }
       
       $total = array_merge($booked, $available_labled);
       return $total;
        }
}