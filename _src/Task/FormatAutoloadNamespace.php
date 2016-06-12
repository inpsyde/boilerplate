<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	InpsydeBoilerplate,
	BrightNucleus\Boilerplate\Scripts\Task,
	Composer\Util;

/**
 * Class FormatAutoloadNamespace
 *
 * @package InpsydeBoilerplate\Task
 */
class FormatAutoloadNamespace extends Task\AbstractTask {

	/**
	 * Formats the provided namespace for usage in composer
	 * autoloader configuration
	 */
	public function complete() {

		$namespace = $this->getConfigKey( 'Placeholders', 'namespace' );
		$namespace_autoload = InpsydeBoilerplate\SetupHelper::getAutoloadNamespace( $namespace[ 'value' ] );
		$this->config[ 'Placeholders' ][ 'namespace_autoload' ] = [
			'name'        => 'Autoload namespace',
			'description' => 'Namespace for composer autoload configuration',
			'value'       => $namespace_autoload,
		];
	}
}