<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	BrightNucleus\Boilerplate\Scripts\Task,
	Composer\Util;

/**
 * Class MoveTemplateFiles
 *
 * @package InpsydeBoilerplate\Task
 */
class MoveTemplateFiles extends Task\MoveTemplateFilesToRootFolder {

	/**
	 * Override the default getTargetPath() as it relies on __DIR__
	 *
	 * @param string $pathname The path and file name to the template file.
	 *
	 * @return string The target path and file name to use for the rendered file.
	 */
	protected function getTargetPath( $pathname ) {

		$filesystem      = new Util\Filesystem();
		$templatesFolder = $this->getConfigKey( 'Folders', 'templates' );
		$folderDiff      = '/' . $filesystem->findShortestPath(
			$this->getConfigKey( 'BaseDir' ),
			$templatesFolder
		);

		return (string) $this->removeTemplateExtension( str_replace( $folderDiff, '', $pathname ) );
	}

}