<?php

namespace Neo\Pkg;

use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\AliasLoader;

use Illuminate\Contracts\Http\Kernel;

use Illuminate\Routing\Router;

use Neo\Pkg\Console\Hello;

use Neo\Pkg\Console\InstallPkg;

use Neo\Pkg\Console\MakeController;

use Neo\Pkg\Console\MakeControllerAjax;

use Neo\Pkg\Console\WriteExample;

use Neo\Pkg\Console\WriteRoutes;

use Neo\Pkg\Console\WriteRoutesJwt;

use Neo\Pkg\Console\WriteKey;

use Neo\Pkg\Http\Middleware\Hash;

use Neo\Pkg\Http\Middleware\Token;

class NeoServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->app['router']->aliasMiddleware('hash' , Hash::class);

		$this->app['router']->aliasMiddleware('token' , Token::class);
		
		if($this->app->runningInConsole())
		{
			$this->commands([
				Hello::class,
				InstallPkg::class,
				MakeController::class,
				MakeControllerAjax::class,
				WriteExample::class,
				WriteRoutes::class,
				WriteRoutesJwt::class,
				WriteKey::class,
			]);
		}
	}

	public function register()
	{
		
		$loader = AliasLoader::getInstance();

		$loader->alias('FunctionPkg','Neo\Pkg\Fecades\FunctionPkg');

		$this->app->bind('FunctionPkg', function(){

			return new FunctionPkg;

		});
		
	}
}