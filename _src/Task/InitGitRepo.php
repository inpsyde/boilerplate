<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	InpsydeBoilerplate,
	BrightNucleus\Exception,
	BrightNucleus\Boilerplate\Scripts\Task;

/**
 * Class InitGitRepo
 *
 * @package InpsydeBoilerplate\Task
 */
class InitGitRepo extends Task\InitializeVCS {

	/**
	 * Override the parent task due to static directory references
	 *
	 * @throws Exception\RuntimeException If the VCS could not be initialized.
	 */
	public function complete() {

		$base_dir = $this->getConfigKey( 'BaseDir' );
		$command  = sprintf(
			'cd %1$s && git init',
			escapeshellarg( $base_dir )
		);

		exec( $command, $output, $return );

		if ( 0 !== $return ) {
			throw new Exception\RuntimeException(
				sprintf(
					_( 'Could not initialize the VCS in folder "%1$s". [Exit Status: %2$d]' ),
					$folder,
					$return
				)
			);
		}
	}
}