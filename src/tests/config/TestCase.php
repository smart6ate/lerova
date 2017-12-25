<?php

namespace Tests;

use App\Exceptions\Handler;
use App\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Smart6ate\Lerova\App\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        $user = $user ?: create(User::class);

        $this->actingAs($user);
        return $this;
    }


    protected function signInWithRole($role)
    {
        $user =  create(User::class);

        if($role instanceof Role)
        {
            $user->roles()->attach($role);
        }

        $this->actingAs($user);
        return $this;
    }


    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(\Exception $e) {}
            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }

    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }


}
