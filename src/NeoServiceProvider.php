<?php

namespace BeatStar\Pkg;

use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\AliasLoader;

use Illuminate\Contracts\Http\Kernel;

use Illuminate\Routing\Router;

use BeatStar\Pkg\Console\Hello;

use BeatStar\Pkg\Console\InstallPkg;

use BeatStar\Pkg\Console\MakeController;

use BeatStar\Pkg\Console\MakeControllerAjax;

use BeatStar\Pkg\Console\WriteExample;

use BeatStar\Pkg\Console\WriteRoutes;

use BeatStar\Pkg\Console\WriteRoutesJwt;

use BeatStar\Pkg\Console\WriteKey;

use BeatStar\Pkg\Http\Middleware\Hash;

use BeatStar\Pkg\Http\Middleware\Token;

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

		$loader->alias('FunctionPkg','BeatStar\Pkg\Fecades\FunctionPkg');

		$this->app->bind('FunctionPkg', function(){

			return new FunctionPkg;

		});
		
	}
}