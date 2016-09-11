<?php

use App\User;
use \Illuminate\Foundation\Testing\DatabaseTransactions;


class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';
    use DatabaseTransactions;


    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function adminLogin()
    {
        $user = User::first();
        $this->be($user);
    }

    public function userLogin()
    {
        $user = User::findorFail(2);
        $this->be($user);
    }
}