<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ticket;
use App\Models\TicketDetail;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function create(Request $request)
    {
        $ticket = new Ticket();
        $ticket->id_branch = $request->id_branch;
        $ticket->id_ticket = $request->id_ticket;
        $ticket->total = $request->total;
        $ticket->folio = $request->folio;        
        $ticket->recived_amount = $request->recived_amount;
        $ticket->cashback_amount = $request->cashback_amount;
        $ticket->id_user = $request->id_user;
        $ticket->id_cash_register = $request->id_cash_register;
        $ticket->id_currency_recived = $request->id_currency_recived;
        $ticket->id_currency_cashback = $request->id_currency_cashback;
        $ticket->id_payment_type = $request->id_payment_type;
        $ticket->client_name = $request->client_name;
        $ticket->id_ticket_status = $request->id_ticket_status;
        $ticket->save();
        $this->createTicketDetails($request);
        return $ticket;
    }

    public function createTicketDetails(Request $request){
        foreach($request->ticket_details as $currentTicketDetail){
            $ticket_detail = new TicketDetail();
            $ticket_detail->id_ticket_details = $currentTicketDetail['id'];
            $ticket_detail->id_branch = $request->id_branch;
            $ticket_detail->id_ticket = $currentTicketDetail['id_ticket'];
            $ticket_detail->id_product = $currentTicketDetail['id_product'];
            $ticket_detail->quantity = $currentTicketDetail['quantity'];            
            $ticket_detail->save();
            $this->registerProduct($currentTicketDetail['product'],$request->id_branch);
        }

    }

    public function registerProduct($product,$branch){
        $exists = Product::find($product['id']);
        if(!$exists)
        {
            $newProduct = new Product();
            $newProduct->id_product =  $product['id'];
            $newProduct->id_branch =  $branch;            
            $newProduct->name = $product['name'];
            $newProduct->price = $product['price'];
            $newProduct->available = $product['available'];
            $newProduct->id_recipe = $product['id_recipe'];
            $newProduct->save();            
        }
    }
}
