<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\JWT\Jwt;
use Tests\TestCase;
use Carbon\Carbon;

class MailVerificationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPutMailVerification()
    {
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
          $jwt = Jwt::generate($payload);

        $response = $this->withHeaders(['Authorization Bearer'=> $jwt])->put('/api/user/verification', [
            'verified'=>'true',
        ]);
        $response->assertStatus(200);

    }
}
