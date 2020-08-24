<?php

namespace beatstar\pkg;

use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\AliasLoader;

use Illuminate\Contracts\Http\Kernel;

use Illuminate\Routing\Router;

use beatstar\pkg\Console\Hello;

use beatstar\pkg\Console\InstallPkg;

use beatstar\pkg\Console\MakeController;

use beatstar\pkg\Console\MakeControllerAjax;

use beatstar\pkg\Console\WriteExample;

use beatstar\pkg\Console\WriteRoutes;

use beatstar\pkg\Console\WriteRoutesJwt;

use beatstar\pkg\Console\WriteKey;

use beatstar\pkg\Http\Middleware\Hash;

class HashServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->app['router']->aliasMiddleware('hash' , Hash::class);
		
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

		$loader->alias('FunctionPkg','beatstar\pkg\Fecades\FunctionPkg');

		$this->app->bind('FunctionPkg', function(){

			return new FunctionPkg;

		});
		
	}
}