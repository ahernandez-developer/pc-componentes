<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketDetail;
use Carbon\Carbon;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {

        //! TODAY
        $todayTotalSales = Ticket::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->where('is_active', 1)->get()->sum('total');
        $todaySales = Ticket::all()->take(1000)->count();
        $todayTicketAvg = 0;
        $hours = Ticket::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get()->groupBy(function ($item) {
            return Carbon::parse($item['created_at'])->hour;
        });
        $todayHourWithMoreSales = 0;
        $todayHourWithMoreSalesCount = 0;
        foreach ($hours as $hour => $values) {
            if ($todayHourWithMoreSales == 0) {
                $todayHourWithMoreSales = $hour;
                $todayHourWithMoreSalesCount = count($values);
            } else if (count($values) > $todayHourWithMoreSalesCount) {
                $todayHourWithMoreSales = $hour;
                $todayHourWithMoreSalesCount = count($values);
            }
        }
        $todayHourWithMoreSales = Carbon::createFromTime($todayHourWithMoreSales, 0, 0, 'UTC')->format('g:i:A');
        $todayTicketAvg = round($todayTotalSales / $todaySales,2);

        //! TODAY

        $tickets = Ticket::orderBy('created_at', 'DESC')->take(1000)->get();
        for ($index = 0; $index < count($tickets); $index++) {
            $tickets[$index]->ticket_details = TicketDetail::with('product')->where('id_ticket', $tickets[$index]->id_ticket)->get();
        }
        $products = TicketDetail::with('product')->get()->groupBy(function ($item) {
            return $item['product']->name;
        });
        // return $products;
        $productsHistory = [];
        foreach ($products as $product => $detail) {
            $ticketDetails = [];
            foreach ($detail as $ticket) {
                $ticketDetails[] = ["hour" => $ticket->created_at, "quantity" => $ticket->quantity, "price" => $ticket->product->price];
            }
            $productsHistory[] = ["name" => $product,"sales"=>$ticketDetails];
        }


        $totalSalesByDay = Ticket::where('is_active',1)->get()->groupBy(function ($item) {
            return Carbon::parse($item['created_at'])->day;
        });

        $avgHourSales = Ticket::all()->groupBy(function ($item) {
            return Carbon::parse($item['created_at'])->hour;
        });

        
        $avgTotalHours =[]; 
        for($i=0; $i<24; $i++)
        {
            if(isset($avgHourSales[$i]))
            {      
                $avgTotalHours[] = ["key"=>Carbon::createFromTime($i, 0, 0, 'UTC')->format('g:i:A'),"value"=>$avgHourSales[$i]->avg('total')];
                 
            }
            else
            {
                $avgTotalHours[] = ["key"=>Carbon::createFromTime($i, 0, 0, 'UTC')->format('g:i:A'),"value"=>0];             
            }
        }
       //return $avgTotalHours;
        return Inertia::render('Home', [
            'tickets' => $tickets,
            'todayTicketAvg' => $todayTicketAvg,
            'todaySales' => $todaySales,
            'todayTotalSales' => $todayTotalSales,
            'todayHourWithMoreSales' => $todayHourWithMoreSales,
            'todayHourWithMoreSalesCount' => $todayHourWithMoreSalesCount,
            'totalSalesByDay'=> $totalSalesByDay,
            'avgTotalHours' =>$avgTotalHours
        ]);
    }

    public function about()
    {
        return Inertia::render('About', [
            'hello' => "hello world",
        ]);
    }
}
