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
}