<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use PHPUnit\Framework\TestCase;

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
    
    public function test_register(){
        $response = Http::post('http:://localhost=>5000/api/register/', [
                'email'=> 'dadasfa21312@mail.ru',
                'first_name'=> 'Eldar',
                'last_name'=> 'Shakhzhanov',
                'password'=> '123321',
                'role'=> 'user',
                'permission'=>'user'
            ]);
            return $response;
    }

    public function test_login(){
        $response = Http::post('http:://localhost=>5000/api/register/', [
            'email'=> 'dadasfa21312@mail.ru',
            'password'=> '123321'
        ]);
        return $response;
    }

    public function test_get_user(){

    }
}
