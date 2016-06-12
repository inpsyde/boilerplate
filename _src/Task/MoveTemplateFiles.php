<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	BrightNucleus\Boilerplate\Scripts\Task,
	Composer\Util,
	Symfony\Component\Finder;

/**
 * Class MoveTemplateFiles
 *
 * @package InpsydeBoilerplate\Task
 */
class MoveTemplateFiles extends Task\MoveTemplateFilesToRootFolder {

	/**
	 * Override the default task due to find DotFiles (.gitignore)
	 */
	public function complete() {

		$filesystem      = new Util\Filesystem();
		$templatesFolder = $this->getConfigKey( 'Folders', 'templates' );
		$finder          = new Finder\Finder();
		$found           = $finder
			->files()
			->ignoreDotFiles( FALSE )
			->in( $templatesFolder );
		foreach ( $found as $file ) {
			$from = $file->getPathname();
			$to   = $this->getTargetPath( $from );
			$filesystem->ensureDirectoryExists( dirname( $to ) );
			$filesystem->copyThenRemove( $from, $to );
		}
	}

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