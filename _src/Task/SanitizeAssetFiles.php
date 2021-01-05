<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use BrightNucleus\Boilerplate\Scripts\Task;
use Composer\Util;

/**
 * Remove style.css and functions.php if the package type
 * is not a wordpress-theme
 *
 * @package InpsydeBoilerplate\Task
 */
class SanitizeAssetFiles extends Task\AbstractTask
{
    const ASSET_FILES = [
        'resources',
        '.eslintrc',
        'package.json',
        'postcss.config.js',
        'tsconfig.json',
        'webpack.config.js',
    ];

    public function complete()
    {
        $useAssets = $this->getConfigKey('Placeholders', 'assets')['value'];

        if ($useAssets === 'yes') {
            return;
        }

        $fs = new Util\Filesystem();
        $baseDir = $this->getConfigKey('BaseDir');

        $this->io->write("Removing asset compiling files");

        foreach (self::ASSET_FILES as $file) {
            $fs->remove("{$baseDir}/{$file}");
        }
    }
}