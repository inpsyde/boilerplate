<?php

namespace InpsydeBoilerplate\Task;

use BrightNucleus\Boilerplate\Scripts\Task;
use BrightNucleus\Exception;
use InpsydeBoilerplate;

class RequireAssetPackages extends Task\AbstractTask
{
    const PACKAGES = [
        "inpsyde/assets",
    ];

    public function complete()
    {
        $baseDir = $this->getConfigKey('BaseDir');

        $command = sprintf(
            'cd %1$s && composer require %2$s',
            escapeshellarg($baseDir),
            implode(' ', self::PACKAGES)
        );

        exec($command, $output, $return);

        if (0 !== $return) {
            throw new Exception\RuntimeException(
                sprintf(
                    'Could not initialize the VCS in folder "%1$s". [Exit Status: %2$d]',
                    $baseDir,
                    $return
                )
            );
        }
    }
}
