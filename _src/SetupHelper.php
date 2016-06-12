<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate;

use
	BrightNucleus\Boilerplate\Scripts;

/**
 * Class SetupHelper
 *
 * @package InpsydeBoilerplate
 */
class SetupHelper extends Scripts\SetupHelper {

	/**
	 * Convert string into lowercase, replaces spaces with dashes.
	 *
	 * @param string $string String to convert into lowercase.
	 *
	 * @return string Converted string.
	 */
	public static function getLowerCase( $string ) {

		return str_replace( ' ', '-', mb_strtolower( $string ) );
	}

	/**
	 * Return a valid license abbreviation according to SPDX recommendation
	 *
	 * @link https://spdx.org/licenses/
	 *
	 * @param string $license
	 *
	 * @return string
	 */
	public static function getSPDXLicense( $license ) {

		$licenses = [
			'mit' => 'MIT',
			'gpl' => 'GPL-2.0' //GPL-2.0+ is deprecated
		];

		$license = strtolower( $license );
		return isset( $licenses[ $license ] )
			? $licenses[ $license ]
			: $licenses[ 'mit' ];
	}

	/**
	 * Normalizes namespace
	 *
	 * @param string $namespace
	 *
	 * @return string
	 */
	public static function getNamespace( $namespace ) {

		$namespace = trim( $namespace );
		$namespace = rtrim( $namespace, '\\' );
		$namespace = str_replace( '\\\\', '\\', $namespace );

		return $namespace;
	}

	/**
	 * Get namespace for composer autoloader config. (Like Name\\Space\\)
	 * Expecting a FQN like Foo\Bar otherwise strange things will happen
	 *
	 * @param $namespace
	 *
	 * @return string
	 */
	public static function getAutoloadNamespace( $namespace ) {

		$namespace = rtrim( $namespace, '\\' ) . '\\';

		return str_replace( '\\', '\\\\', $namespace );
	}
}