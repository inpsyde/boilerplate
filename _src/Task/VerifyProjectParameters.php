<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	BrightNucleus\Boilerplate\Scripts\Task,
	Symfony\Component\Console\Formatter;

/**
 * Class VerifyProjectParameters
 *
 * @package InpsydeBoilerplate\Task
 */
class VerifyProjectParameters extends Task\VerifyProjectParameters {

	/**
	 * Print escaped values of all parameters
	 * Strings like 'Namespace\\' has to be escaped
	 *
	 * @link https://github.com/symfony/symfony/issues/17908
	 *
	 * @return void
	 */
	public function complete() {

		$this->io->write( '<info>Summary :</info>' );
		foreach ( $this->getConfigKey( 'Placeholders' ) as $placeholder ) {
			$this->io->write(
				sprintf(
					_( '%1$s: <info>%2$s</info>' ),
					Formatter\OutputFormatter::escape( $placeholder[ 'name' ] ),
					Formatter\OutputFormatter::escape( $placeholder[ 'value' ] )
				)
			);
		}
	}

}