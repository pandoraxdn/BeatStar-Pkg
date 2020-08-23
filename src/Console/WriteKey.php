<?php

namespace Neo\Pkg\Console;

use Illuminate\Console\Command;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;

class WriteKey extends Command
{
	protected $signature = 'pkg:key';

	protected $description = 'Neo Pkg Key';

	public function handle()
	{
		$this->info('Writing Neo-Pkg Key...');

		$key = hash('sha512',rand(1000,100000));

		if (File::exists(app()->environmentFilePath())) {

			$this->setEnvironmentValue('Neo_Pkg_Key',$key);

        	$this->info("Your key: [".$key."]");

		}else{

        	$this->info("Error: Not found file .env ");
		}


	}

	public function setEnvironmentValue($envKey, $envValue)
	{

        if (Str::contains(file_get_contents(app()->environmentFilePath()), $envKey) === false) {

            file_put_contents(app()->environmentFilePath(), PHP_EOL.$envKey."=".$envValue.PHP_EOL, FILE_APPEND);

        } else {

            file_put_contents(app()->environmentFilePath(), str_replace(
                $envKey."=".config("neo-pkg.secret"),
                $envKey."=".$envValue, file_get_contents(app()->environmentFilePath())
            ));
        }
	}

}