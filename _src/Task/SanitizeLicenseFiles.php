<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	BrightNucleus\Boilerplate\Scripts\Task,
	BrightNucleus\Exception,
	Composer\Util;

/**
 * Renames the relevant license file to 'LICENSE' and removes
 * the one we don't use
 *
 * @package InpsydeBoilerplate\Task
 */
class SanitizeLicenseFiles extends Task\AbstractTask {

	/**
	 * Renames the relevant license file to 'LICENSE' and removes
	 * the one we don't use
	 */
	public function complete() {

		$fs            = new Util\Filesystem;
		$base_dir      = $this->getConfigKey( 'BaseDir' );
		$license       = $this->getConfigKey( 'Placeholders', 'license' )[ 'value' ];
		$license_files = [
			'MIT'     => 'LICENSE.mit',
			'GPL-2.0' => 'LICENSE.gpl2'
		];

		if ( ! isset( $license_files[ $license ] ) ) {
			throw new Exception\LogicException(
				"No file found for license '{$license}'"
			);
		}

		$license_file = "{$base_dir}/{$license_files[ $license ]}";
		$fs->copyThenRemove( $license_file, "{$base_dir}/LICENSE" );
		foreach ( $license_files as $file ) {
			$this->io->write(
				sprintf(
					"Removing license file %s",
					basename( $file )
				)
			);
			$fs->remove( $file );
		}
	}

}