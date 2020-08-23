<h1>Beatstar/pkg</h1>

<h2>Installing pkg</h2>
<p><strong>composer require beatstar/pkg</strong></p>
<p>
	Enter the pkg installation command into terminal/cmd/bash.
</p>

<h2>Comands</h2>
<p>
	<strong>php artisan pkg:install</strong>
	<br>
	Install configuration of pkg.
</p>
<p>
	<strong>php artisan pkg:key</strong>
	<br>
	Generate key for encrypt and JWT signer.
</p>
<p>
	<strong>php artisan pkg:route</strong>
	<br>
	Writing routes of pkg in your project.
	<br>
	Note the current routes will be overwritten from the /routes/web.php file.
	<br>
	It is recommended that you backup routes if they exist.
</p>
<p>
	<strong>php artisan pkg:route-jwt</strong>
	<br>
	Writing routes of pkg in your project.
	<br>
	Note the current routes will be overwritten from the /routes/web.php file.
	<br>
	It is recommended that you backup routes if they exist.
	<br>
	This command adds a JWT token validation to the laravel sessions.
</p>
<p>
	<strong>php artisan pkg:example</strong>
	<br>
	Displays sample files from the use of pkg.
	<br>
	The files have been copied to /resources/example/
</p>
<p>
	<strong>php artisan pkg:controller {name : The controller name}</strong>
	<br>
	Controller based on pkg configuration.
	<br>
	Note the controller only receives the name parameter.
</p>
<p>
	<strong>php artisan pkg:controller-ajax {name : The controller name}</strong>
	<br>
	Controller based on ajax pkg configuration.
	<br>
	Note the controller only receives the name parameter.
</p>