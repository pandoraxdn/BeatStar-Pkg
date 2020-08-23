<?php

namespace beatstar\pkg\Console;

use Illuminate\Console\Command;

class WriteRoutesJwt extends Command
{
	protected $signature = 'pkg:route-jwt';

	protected $description = 'Note the current routes will be overwritten from the /routes/web.php file.';

	public function handle()
    {
        $this->info('Writing routes...');

        $this->write_routes();

        $this->info('Written routes.');
    }

    public function write_routes()
    {
        $file_package = __DIR__.'./../Routes/jwt.php';

        $file_laravel = base_path('/routes/web.php');

        $package_content = file_get_contents($file_package);

        $laravel_content = file_get_contents($file_laravel);

        $laravel_content = $package_content;

        file_put_contents($file_laravel, $laravel_content);
    }
}