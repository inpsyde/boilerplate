<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate;

use
	BrightNucleus\Boilerplate\Scripts;

$base_dir = dirname( __DIR__ );

/*
 * Folder layout.
 */
$folders = [
	'config'    => "{$base_dir}/_config",
	'scripts'   => "{$base_dir}/_scripts",
	'templates' => "{$base_dir}/_templates",
	'vendor'    => "{$base_dir}/vendor",
	'vcs'       => "{$base_dir}/.git",
];

/*
 * Placeholder definitions.
 */
$placeholders = [
	'Vendor'      => [
		'name'        => 'Vendor name',
		'description' => "The vendor name of the package (probably your company's name).",
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateTrimmed( $placeholder );
		},
		'default'     => 'Inpsyde',
	],
	'VendorPC'    => [
		'name'        => 'Vendor name in PascalCase',
		'description' => 'The vendor name of the package in "PascalCase" (no spaces, each word starting with a capital).',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validatePascalCase( $placeholder );
		},
		'default'     => function ( $placeholders ) {

			return Scripts\SetupHelper::getPascalCase( $placeholders[ 'Vendor' ][ 'value' ] );
		},
	],
	'vendor'      => [
		'name'        => 'Vendor name in lowercase',
		'description' => 'The vendor name of the package in "lowercase" (no spaces, each word starting with a lower case letter).',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateLowerCase( $placeholder );
		},
		'default'     => function ( $placeholders ) {

			return Scripts\SetupHelper::getLowerCase( $placeholders[ 'VendorPC' ][ 'value' ] );
		},
	],
	'Package'     => [
		'name'        => 'Package name',
		'description' => 'The name of the package.',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateTrimmed( $placeholder );
		},
		'default'     => 'Package Name',
	],
	'PackagePC'   => [
		'name'        => 'Package name in PascalCase',
		'description' => 'The package name of the package in "PascalCase" (no spaces, each word starting with a capital).',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validatePascalCase( $placeholder );
		},
		'default'     => function ( $placeholders ) {

			return Scripts\SetupHelper::getPascalCase( $placeholders[ 'Package' ][ 'value' ] );
		},
	],
	'package'     => [
		'name'        => 'Package name in lowercase',
		'description' => 'The package name of the package in "lowercase" (no spaces, each word starting with a lower case letter).',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateLowerCase( $placeholder );
		},
		'default'     => function ( $placeholders ) {

			return Scripts\SetupHelper::getLowerCase( $placeholders[ 'PackagePC' ][ 'value' ] );
		},
	],
	'type' => [
		'name'        => 'Package type',
		'description' => 'The composer type of the package (library, wordpress-plugin, wordpress-theme, project)',
		'validation'  =>  function ( $placeholder ) {

			return Scripts\Validation::validateLowerCase( $placeholder );
		},
		'default'     => 'library'
	],
	'namespace'     => [
		'name'        => 'Package base namespace',
		'description' => 'The base PHP namespace of the package.',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateLowerCase( $placeholder );
		},
		'default'     => function ( $placeholders ) {

			return Scripts\SetupHelper::getLowerCase( $placeholders[ 'PackagePC' ][ 'value' ] );
		},
	],
	'description' => [
		'name'        => 'Package description',
		'description' => 'The package description in one sentence.',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateTrimmed( $placeholder );
		},
		'default'     => 'TODO: Describe what this package is all about.',
	],
	'author'      => [
		'name'        => 'Author name',
		'description' => 'The name of the author of the package.',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateTrimmed( $placeholder );
		},
		'default'     => 'Inpsyde GmbH',
	],
	'email'       => [
		'name'        => 'Author email',
		'description' => 'The email of the author.',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateEmail( $placeholder );
		},
		'default'     => 'hallo@inpsyde.com',
	],
	'url'         => [
		'name'        => 'Author URL',
		'description' => 'The website of the author or the package.',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateURL( $placeholder );
		},
		'default'     => 'http://inpsyde.com/',
	],
	'year'        => [
		'name'        => 'Copyright year',
		'description' => 'The year for which the copyright is displayed. Can include a range of years as well.',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateYear( $placeholder );
		},
		'default'     => date( 'Y' ),
	],
	'date'        => [
		'name'        => 'Date',
		'description' => 'Date to be used for first change log entry.',
		'validation'  => function ( $placeholder ) {

			return Scripts\Validation::validateDate( $placeholder );
		},
		'default'     => date( 'Y-m-d' ),
	],
];

return [
	'Inpsyde' => [
		'Boilerplate' => [
			'Folders'           => $folders,
			'Placeholders'      => $placeholders,
			'TemplateExtension' => '.template',
			'BaseDir'           => $base_dir
		],
	],
];
