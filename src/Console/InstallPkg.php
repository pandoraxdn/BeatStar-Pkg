<?php

namespace beatstar\pkg\Console;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\File;

class InstallPkg extends Command
{
	protected $signature = 'pkg:install';

	protected $description = 'Install Neo Pkg Package.';

	public function handle()
	{
		$this->info('Installing Neo-Pkg Package...');

        $this->call('vendor:publish', [
            '--provider' => "Neo\Pkg\NeoServiceProvider"
        ]);

        $this->config();

        $this->info('Installed Neo-Pkg Package.');
	}

	public function config(){

        if (File::exists(base_path('/config/neo-pkg.php'))) {

            File::delete(base_path('/config/neo-pkg.php'));

            File::copy(__DIR__.'./../Config/neo-pkg.php', base_path('/config/neo-pkg.php'));

        }else{

            File::copy(__DIR__.'./../Config/neo-pkg.php', base_path('/config/neo-pkg.php'));

        }

    }

}