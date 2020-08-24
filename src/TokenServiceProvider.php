<?php

namespace beatstar\pkg;

use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\AliasLoader;

use Illuminate\Contracts\Http\Kernel;

use Illuminate\Routing\Router;

use beatstar\pkg\Http\Middleware\Token;

class TokenServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->app['router']->aliasMiddleware('token' , Token::class);
	}

	public function register()
	{
		//
	}
}