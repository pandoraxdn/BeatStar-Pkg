<?php

namespace BeatStar\Pkg\Console;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\File;

class WriteExample extends Command
{
	protected $signature = 'pkg:example';

	protected $description = 'Example files.';

	public function handle()
    {
        $this->info('Copy of example files...');

        $this->examples();

        $this->info('The files have been copied to /resources/example/');
    }

    public function examples(){

        if (File::exists(base_path('/resources/example/'))) {

            File::deleteDirectory(base_path('/resources/example/'));

            File::copyDirectory(__DIR__.'./../Example', base_path('/resources/example/'));

        }else{

            File::copyDirectory(__DIR__.'./../Example', base_path('/resources/example/'));

        }

    }

}