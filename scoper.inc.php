<?php
use Isolated\Symfony\Component\Finder\Finder;

return array(
	'prefix'          => 'StarterTheme',
	'finders'         => array(
		Finder::create()
			->files()
			->ignoreVCS( true )
			->name( '*.php' )
			->notName( '/LICENSE|.*\\.md|.*\\.dist|Makefile|composer\\.json|composer\\.lock/' )
			->in( 'vendor/omgpress/omgcore' )
			->append( array( 'vendor/omgpress/omgcore/composer.json' ) ),
		Finder::create()
			->files()
			->ignoreVCS( true )
			->name( '*.php' )
			->notName( '/LICENSE|.*\\.md|.*\\.dist|Makefile|composer\\.json|composer\\.lock/' )
			->in( 'vendor/omgpress/acf-block-autoloader' )
			->append( array( 'vendor/omgpress/acf-block-autoloader/composer.json' ) ),
		Finder::create()
			->files()
			->ignoreVCS( true )
			->name( '*.php' )
			->notName( '/LICENSE|.*\\.md|.*\\.dist|Makefile|composer\\.json|composer\\.lock/' )
			->in( 'vendor/stoutlogic/acf-builder' )
			->append( array( 'vendor/stoutlogic/acf-builder/composer.json' ) ),
		Finder::create()
			->append( array( 'composer.json' ) ),
	),
	'exclude-classes' => require_once __DIR__ . '/vendor/omgpress/omgcore/scoper.exclude-classes.php',
);
