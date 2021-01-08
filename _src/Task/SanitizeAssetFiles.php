<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use BrightNucleus\Boilerplate\Scripts\Task;
use Composer\Util;

/**
 * Remove Asset bundling components if the package type
 * is not a wordpress-theme or wordpress-plugin
 *
 * @package InpsydeBoilerplate\Task
 */
class SanitizeAssetFiles extends Task\AbstractTask
{
    const CONFIG_KEY = 'assets';
    const CONFIG_TYPE_KEY = 'type';

    const ASSET_FILES = [
        'resources',
        '.eslintrc',
        'composer.assets.json',
        'functions.assets.php',
        'plugin.assets.json',
        'package.json',
        'postcss.config.js',
        'tsconfig.json',
        'webpack.config.js',
    ];

    const WP_TYPES = [
        'wordpress-theme',
        'wordpress-plugin'
    ];

    public function complete()
    {
        $type = $this->getConfigKey('Placeholders', self::CONFIG_TYPE_KEY)['value'];

        $fs = new Util\Filesystem();
        $baseDir = $this->getConfigKey('BaseDir');

        if (!in_array($type, self::WP_TYPES, true)) {
            $this->removeAssetsFiles($fs, $baseDir);

            return;
        }

        $useAssets = $this->getConfigKey('Placeholders', self::CONFIG_KEY)['value'];

        if ($useAssets === 'yes') {
            $fs->remove("{$baseDir}/assets");

            $fs->remove("{$baseDir}/composer.json");
            $fs->rename("{$baseDir}/composer.assets.json", "{$baseDir}/composer.json");

            switch ($type) {
                case 'wordpress-theme':
                    $fs->remove("{$baseDir}/functions.php");
                    $fs->remove("{$baseDir}/plugin.assets.php");
                    $fs->rename("{$baseDir}/functions.assets.php", "{$baseDir}/functions.php");
                    break;
                case 'wordpress-plugin':
                    $package = $this->getConfigKey('Placeholders', 'package_key')['value'];

                    $fs->remove("{$baseDir}/{$package}.php");
                    $fs->remove("{$baseDir}/functions.php");
                    $fs->rename("{$baseDir}/plugin.assets.php", "{$baseDir}/{$package}.php");
                    break;
            }

            return;
        }

        // Remove Asset Files, if the package uses static assets
        $this->removeAssetsFiles($fs, $baseDir);
    }

    /**
     * @param Util\Filesystem $fs
     * @param string $baseDir
     */
    private function removeAssetsFiles($fs, $baseDir)
    {
        $this->io->write("Removing asset files");

        foreach (self::ASSET_FILES as $file) {
            $fs->remove("{$baseDir}/{$file}");
        }
    }
}
