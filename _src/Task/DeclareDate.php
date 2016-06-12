<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	BrightNucleus\Boilerplate\Scripts\Task,
	Composer\Util;

/**
 * Class DeclareDate
 *
 * @package InpsydeBoilerplate\Task
 */
class DeclareDate extends Task\AbstractTask {

	/**
	 * Declares the date parameter
	 */
	public function complete() {

		$this->config[ 'Placeholders' ][ 'year' ] = [
			'name'  => 'Copyright year',
			'description' => '',
			'value' => date( 'Y' )
		];
	}
}