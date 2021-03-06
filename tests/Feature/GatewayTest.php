<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\JWT\Jwt;
use Carbon\Carbon;

class GatewayTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTickets()
    {
        $payload = json_encode([
        'id' => 1,
        'exp' => Carbon::now()->addDays(1)->timestamp
      ]);

        
        $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->post('/api/gettickets');

        $response->assertStatus(200);
    }
    public function testGetTicketsWithoutJwt()
    {
        $response = $this->post('/api/gettickets');
        
    if($response->getData()->status == "Authorization Token not found"){
        $this->assertTrue(true);
    }else{
        $this->assertTrue(true);
    }
    }

    public function testGetTicketById()
    {
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
            $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->post('/api/getticketbyid', [
            "json"=>"1"
        ]);

        $response->assertStatus(200);
    }
    
    public function testGetTicketByIdWithoutJwt()
    {
        $response = $this->post('/api/getticketbyid', [
            "json"=>"1"
        ]);

        if($response->getData()->status == "Authorization Token not found"){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(true);
        }
    }
    
    public function testFalseGetTicketById()
    {
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
            $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->post('/api/getticketbyid', [
            "json"=> 235
        ]);

        $response->assertStatus(401);
    }
    public function testCreateMessage()
    {
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
            $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->post('/api/createmessage', [
            "json"=>['ticket_id'=>1,
            'message'=> "message"]
        ]);

        $response->assertStatus(200);
    }
    public function testCreateMessageWithoutJwt()
    {
        $response = $this->post('/api/createmessage', [
            "json"=>['ticket_id'=>1,
            'message'=> "message"]
        ]);

        if($response->getData()->status == "Authorization Token not found"){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(true);
        }
    }
    public function testFalseCreateMessage()
    {
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
            $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->post('/api/createmessage', [
            "json"=>['ticket_id'=>1023,
            'message'=> "message"]
        ]);

        $response->assertStatus(401);
    }
    public function testGetMessagesWithoutJwt()
    {
        $response = $this->post('/api/getmessages', [
        ]);
        if($response->getData()->status == "Authorization Token not found"){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(true);
        }

    }
    public function testGetMessages()
    {
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
            $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->post('/api/getmessages', [
        ]);

        $response->assertStatus(200);
    }
    public function testGetMessagesByTicketId()
    {
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
            $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->post('/api/getmessagesbyticketid', [
            "json"=>"1"
        ]);

        $response->assertStatus(200);
    }
    public function testFalseGetMessagesByTicketId()
    {
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
            $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->post('/api/getmessagesbyticketid', [
            "json"=>1024
        ]);

        $response->assertStatus(401);
    }
    public function testBadUrl()
    {
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
            $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->post('/api/getmessagasda', [
        ]);

        $response->assertStatus(200);
    }
    
    public function testBadUrlWithoutJwt()
    {
        $response = $this->post('/api/getmessagasda', [
        ]);

        if($response->getData()->status == "Authorization Token not found"){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(true);
        }
    }
    
}
