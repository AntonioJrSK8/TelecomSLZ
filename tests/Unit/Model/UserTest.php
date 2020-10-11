<?php

namespace Tests\Unit\Model;

use Tests\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     * php artisan make:test NomeTest --unit
     * @return void
     */
    public function testFillable()
    {
        $fillable = ['name', 'email', 'password', 'enrolment'];
        $this->assertEquals($fillable, (new User())->getFillable());
    }

    public function testDate()
    {
        $date = ['created_at', 'updated_at'];
        $this->assertEquals($date, (new User())->getDates() );
    }
}
