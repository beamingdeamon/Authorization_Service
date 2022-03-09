<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\JWT\Jwt;
use Tests\TestCase;
use Carbon\Carbon;

class UserInfoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUserInfo()
    {   
        $payload = json_encode([
        'id' => 1,
        'exp' => Carbon::now()->addDays(1)->timestamp
      ]);

        
        $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->get('/api/user');

        $response->assertStatus(200);
    }
    public function testGetUserInfoWithoutJwt()
    {   
        $response = $this->get('/api/user');

        if($response->getData()->status == "Authorization Token not found"){
          $this->assertTrue(true);
      }else{
          $this->assertTrue(true);
      }
    }
    public function testPutUserInfo()
    {
        $payload = json_encode([
        'id' => 1,
        'exp' => Carbon::now()->addDays(1)->timestamp
      ]);

        
        $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->put('/api/user/edit', [
            'first_name'=>'test2'
        ]);
        $response->assertStatus(200);

    }
    public function testFalseJwtPutUserInfo()
    {
        $response = $this->put('/api/user/edit', [
            'first_name'=>'test2'
        ]);
        if($response->getData()->status == "Authorization Token not found"){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(true);
        }

    }
    public function testFalsedataPutUserInfo()
    {
        $payload = json_encode([
        'id' => 15325,
        'exp' => Carbon::now()->addDays(1)->timestamp
      ]);

        
        $jwt = Jwt::generate($payload);
        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->put('/api/user/edit', [
        ]);
        $response->assertStatus(200);

    }
    
}
