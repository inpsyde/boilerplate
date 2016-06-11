<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate;

use
	BrightNucleus\Boilerplate\Scripts,
	BrightNucleus\Boilerplate\Scripts\Task,
	BrightNucleus\Config,
	Composer\Script;

/**
 * Class Setup
 *
 * @package InpsydeBoilerplate
 */
class Setup extends Scripts\Setup {

	/**
	 * Main entrance point of the setup process.
	 * Runs at composers post-create-project-cmd event
	 *
	 * @param Script\Event $event
	 */
	public static function run( Script\Event $event ) {

		parent::run( $event );
	}

	/**
	 * @param Script\Event $event
	 *
	 * @return array
	 */
	protected static function getSetupTasks( Script\Event $event ) {

		return [
			Task\AskAboutProjectParameters::class,
			Task\VerifyProjectParameters::class,
			//Task\RemoveExistingRootFiles::class,
			Task\ReplacePlaceholdersInTemplateFiles::class,
			Task\MoveTemplateFilesToRootFolder::class,
			//Task\RemoveConfigFolder::class,
			//Task\RemoveTemplatesFolder::class,
			//Task\RemoveOriginalVCSData::class,
			//Task\InitializeVCS::class,

			// Removing the vendor folder also removes the autoloader,
			// so this task needs to run last.
			//Task\RemoveVendorFolder::class,
		];
	}

	/**
	 * Get the configuration file to use.
	 *
	 * @param Script\Event $event The Composer event that is being handled.
	 *
	 * @return Config\ConfigInterface Configuration file to use.
	 */
	protected static function getConfig( Script\Event $event ) {

		$key   = static::getExtraKey();
		$extra = $event->getComposer()
			->getPackage()
			->getExtra();

		$configFile = isset( $extra[ $key ] )
		&& isset( $extra[ $key ][ 'config-file' ] )
			? $extra[ $key ][ 'config-file' ]
			: '_config/defaults.php';

		$configPrefix = isset( $extra[ $key ] )
		&& isset( $extra[ $key ][ 'config-prefix' ] )
			? $extra[ $key ][ 'config-prefix' ]
			: 'BrightNucleus/Boilerplate';

		return Config\ConfigFactory::create( dirname( __DIR__ ) . "/{$configFile}" )
			->getSubConfig( $configPrefix );
	}
}