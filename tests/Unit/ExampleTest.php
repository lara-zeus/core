<?php

namespace LaraZeus\Core\Tests\Unit;

use Orchestra\Testbench\TestCase;

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

    /** @test */
    public function accsess_the_route()
    {
        $this->get('/Forms/User/List')->assertStatus('200');
    }
}
