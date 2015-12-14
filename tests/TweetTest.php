<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TweetTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }
     /** 
      * @test 
      */ 
     public function should_have_index() 
     {
     	//$this->call('GET', '/tweets');
     	//$this->assertResponseOk();

        $this->visit('/tweets')->see('Tweets');//->dump()
  
        $this->assertResponseOk(); 
  
     } 
}