<?php

namespace App\Http\Services;

use App\JWT\Jwt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class TicketService{

    
    public function getTickets(){
        $response = Http::get('http://localhost:8000/api/gettickets/');
        return $response; 
    }

    public function getTicketbyId($id){
        $url = 'http://localhost:8000/api/getticketbyid/';
        $url .= $id;
        
        $response = Http::get($url);
        return $response; 
    }

    public function createMessage(Request $request){
        $string_json = $request->json;
        $user = Jwt::validation($request->bearerToken());
        $response = Http::post('http://localhost:8000/api/createmessage/', [
        'ticket_id'=>$string_json["ticket_id"],
        'user_id'=> $user->id,
        'message'=> $string_json["message"],
        ]);
        return $response;
    }

    public function getMessages(){
        $response = Http::get('http://localhost:8000/api/getmessages/');
        return $response; 
    }

    public function getMessagesbyTicketId($id){
        $url = 'http://localhost:8000/api/getmessages';
        $url .= $id;

        $response = Http::get($url);
        return $response; 
    }
}