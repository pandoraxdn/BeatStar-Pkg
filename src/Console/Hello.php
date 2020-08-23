<?php

namespace beatstar\pkg\Console;

use Illuminate\Console\Command;

class Hello extends Command
{
	protected $signature = 'pkg:hello';

	protected $description = 'Descryption of pkg';

	public function handle()
	{
		$this->info("Hello world");
	}

}