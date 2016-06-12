<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	BrightNucleus\Boilerplate\Scripts\Task,
	Composer\Util;

/**
 * Remove style.css and functions.php if the package type
 * is not a wordpress-theme
 *
 * @package InpsydeBoilerplate\Task
 */
class SanitizeThemeFiles extends Task\AbstractTask {

	/**
	 * Remove style.css and functions.php if the package type
	 * is not a wordpress-theme
	 */
	public function complete() {

		$type = $this->getConfigKey( 'Placeholders', 'type' )[ 'value' ];
		if ( $type === 'wordpress-theme' ) {
			return;
		}

		$fs       = new Util\Filesystem;
		$base_dir = $this->getConfigKey( 'BaseDir' );

		$this->io->write( "Removing theme files" );
		$fs->remove( "{$base_dir}/style.css" );
		$fs->remove( "{$base_dir}/functions.php" );
	}
}