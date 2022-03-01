<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostRole(){

        $response = $this->post('/api/role',[
            'role'=>'test',
            'permission'=>'test'
        ]);

        $response->assertStatus(200);
    }
    public function testPostFalseRole(){

        $response = $this->post('/api/role',[
            'role'=>'test',
        ]);

        $response->assertStatus(300);
    }
    public function testGetRoles()
    {
        $response = $this->get('/api/role');

        $response->assertStatus(200);
    }
    public function testPutRole()
    {
        $id = Role::all()->random()->id;
        $response = $this->put('/api/role/'.$id, [
            'role'=>'test1',
            'permission'=>'test1'
        ]);
        $response->assertStatus(200);

    }
    
    public function testFalsePutRole()
    {
        $id = 21304;
        $response = $this->put('/api/role/'.$id, [
            'role'=>'test1',
            'permission'=>'test1'
        ]);
        $response->assertStatus(404);

    }
    public function testPutFalseRole()
    {
        $id = Role::all()->random()->id;
        $response = $this->put('/api/role/'.$id, [
            'role'=>'test1',
        ]);
        $response->assertStatus(200);

    }
    public function testDeleteRole(){
        $id = Role::factory()->create()->id;
        $response = $this->delete('/api/role/'.$id);

        $response->assertStatus(200);
    }
    
    public function testFalseDeleteRole(){
        $id = 213541;
        $response = $this->delete('/api/role/'.$id);

        $response->assertStatus(404);
    }
}
