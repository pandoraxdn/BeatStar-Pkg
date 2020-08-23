<?php

namespace Neo\Pkg\Console;

use Illuminate\Console\Command;

use Illuminate\Support\Str;

use Illuminate\Support\Composer;

use Illuminate\Filesystem\Filesystem;

class MakeController extends Command
{
	protected $signature = 'pkg:controller {name : The controller name}';

	protected $description = 'Create a customized controller in Laravel.';

	private $files;

	private $composer;

	public function __construct(Filesystem $files, Composer $composer)
    {
        parent::__construct();

        $this->files = $files;

        $this->composer = $composer;
    }

    public function handle()
    {
        $name = trim($this->input->getArgument('name'));

        $this->createController($name);

    }

    private function createController($modelName)
    {
        $filename = ucfirst($modelName) . 'Controller.php';

        if ($this->files->exists(app_path('Http/' . $filename))) {

            $this->error('Controller already exists.');

            return false;
            
        }

        $stub = $this->files->get(__DIR__ . './../Http/Controllers/controller.stub');

        $stub = str_replace('MyName', ucfirst($modelName), $stub);

        $this->files->put(app_path('Http/Controllers/' . $filename), $stub);

        $this->info('Created controller ' . $filename);

        return true;
    }

}