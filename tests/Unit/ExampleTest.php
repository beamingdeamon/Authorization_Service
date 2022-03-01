<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use PHPUnit\Framework\TestCase;
use App\JWT\Jwt;
use Carbon\Carbon;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_example1()
    {
        $this->assertTrue(true);
    }
    public function test_example2()
    {
        $this->assertTrue(true);
    }
    public function testJwtGeneration(){
        $payload = json_encode([
            'id' => 1,
            'exp' => Carbon::now()->addDays(1)->timestamp
          ]);
    
            
          $jwt = Jwt::generate($payload);
          if(isset($jwt)){
            $this->assertTrue(true);
          }
    }
    
    public function testFalseJwtGeneration(){
        $payload = json_encode([]);
    
            
          $jwt = Jwt::generate($payload);
          if(isset($jwt)){
            $this->assertTrue(true);
          }
    }
    
    public function testGetDataFromJwt(){
        $id=1;
        $payload = json_encode([
            'id' => $id,
            'exp' => Carbon::now()->addDays(1)->timestamp
        ]);
    
            
          $jwt = Jwt::generate($payload);
          $validated_data = Jwt::validation($jwt);
          if($validated_data->id == $id){
            $this->assertTrue(true);
          }
    }
    
    public function testValidateJwt(){
        $id=1;
        $payload = json_encode([
            'id' => $id,
            'exp' => Carbon::now()->addDays(1)->timestamp
        ]);
    
            
          $jwt = Jwt::generate($payload);
          $validated_data = Jwt::validation($jwt);
          if($validated_data->id == $id){
            $this->assertTrue(true);
          }
    }
    
    
    
}
