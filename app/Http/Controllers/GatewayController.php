<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Services\TicketService;
use Illuminate\Support\Facades\Validator;

class GatewayController extends Controller
{
    public function proxy($route, Request $request){
        $ticket = new TicketService();
        $data = Validator::make($request->only('json'), [
        'json' => 'nullable',
        ]);
        if ($data->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        };
        if ($route == 'gettickets'){
            $ticket->getTickets();
        }
        else if ($route == 'getticketbyid'){
            $id = $request->json;
            $ticket->getTicketbyId($id);
        }
        else if ($route == 'createmessage'){
            $ticket->createMessage($request);
        }
        else if ($route == 'getmessages'){
            $ticket->getMessages();
        }
        else if ($route == 'getmessagesbyticketid'){
            $ticket->getMessagesbyTicketId($request->json);
        }
        else{
            return response()->json('Bad Request', 300);
        }
        
        return response()->json($ticket);
    }

}
