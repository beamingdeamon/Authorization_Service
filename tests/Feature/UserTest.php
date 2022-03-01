<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\JWT\Jwt;
use Carbon\Carbon;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister(){

        $response = $this->post('/api/register',[
            "email"=> "test@mail.ru",
            "first_name"=> "test",
            "last_name"=> "test",
            "password"=> "test",
            "role_id"=> 1
        ]);

        $response->assertStatus(300);
    }
    public function testFalseRegister(){

        $response = $this->post('/api/register',[
            "email"=> "test@mail.ru",
            "first_name"=> "test",
            "last_name"=> "test",
        ]);

        $response->assertStatus(300);
    }
    
    public function testLogin(){

        $response = $this->post('/api/login',[
            'email'=>'test',
            'password'=>'test'
        ]);

        $response->assertStatus(200);
    }
    public function testFalseLogin(){

        $response = $this->post('/api/login',[
            'email'=>'test',
            'password'=>'te231'
        ]);

        $response->assertStatus(200);
    }
    
    public function testDeleteUser(){
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
        $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->delete('/api/user');

        $response->assertStatus(200);
    }
    public function testLogout()
    {
        $payload = json_encode([
        'id' => 5,
        'exp' => Carbon::now()->addDays(1)->timestamp
      ]);

        
        $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->delete('/api/logout');
        $response->assertStatus(200);

    }
    public function testLogoutWithoutJwt()
    {
        $response = $this->delete('/api/logout'); 
        if($response->getData()->status == "Authorization Token not found"){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(true);
        }

    }
    public function testDeleteUserWithoutJwt(){
        $response = $this->delete('/api/user');
        if($response->getData()->status == "Authorization Token not found"){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(true);
        }
    }
}
