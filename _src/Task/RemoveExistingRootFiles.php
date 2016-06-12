<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	BrightNucleus\Boilerplate\Scripts\Task,
	Composer\Util,
	Exception;

/**
 * Class RemoveExistingRootFiles
 *
 * @package InpsydeBoilerplate\Task
 */
class RemoveExistingRootFiles extends Task\RemoveExistingRootFiles {

	/**
	 * Override the default task due to static directory references
	 */
	public function complete() {

		$fs       = new Util\Filesystem;
		$base_dir = $this->getConfigKey( 'BaseDir' );
		foreach ( $this->getRootFiles() as $file ) {
			try {
				$fs->remove( "{$base_dir}/{$file}" );
			} catch ( Exception $exception ) {
				$this->io->writeError(
					sprintf(
						_( 'Could not remove file "%1$s". Reason: %2$s' ),
						$file,
						$exception->getMessage()
					)
				);
			}
		}
	}

	/**
	 * Get an array of file names for all the files that need to be removed from the project root.
	 *
	 * @return array Array of file names.
	 */
	protected function getRootFiles() {

		return [
			'.gitignore',
			'LICENSE',
			'README.md',
			'composer.json',
			'composer.lock',
		];
	}
}