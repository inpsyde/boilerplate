<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate;

use BrightNucleus\Boilerplate\Scripts;
use BrightNucleus\Exception;

/**
 * Class Validation
 *
 * @package InpsydeBoilerplate
 */
class Validation extends Scripts\Validation
{

    /**
     * Verify that a string is in lowercase or throw an Exception.
     *
     * @param string $string The string to validate.
     *
     * @return string The validated string.
     * @throws Exception\InvalidArgumentException If the string is not in lowercase
     */
    public static function validateLowerCase($string)
    {
        if ($string === Scripts\SetupHelper::getLowerCase($string)) {
            return $string;
        }

        return parent::validateLowerCase($string);
    }

    /**
     * Validates a license abbreviation
     *
     * @param $license
     *
     * @return string|NULL
     * @throws Exception\InvalidArgumentException If the licence is unknown
     */
    public static function validateLicenseAbbr($license)
    {
        $licenses = ['MIT', 'GPL'];
        if (in_array($license, $licenses, true)) {
            return $license;
        }

        throw new Exception\InvalidArgumentException(
            "Provided license is invalid: '{$license}'"
        );
    }

    /**
     * Validates a composer package type
     *
     * @param $type
     *
     * @return string|NULL
     * @throws Exception\InvalidArgumentException If the type is unknown
     */
    public static function validatePackageType($type)
    {
        $packages = [
            'library',
            'project',
            'wordpress-plugin',
            'wordpress-muplugin',
            'wordpress-theme',
        ];

        if (in_array($type, $packages, true)) {
            return $type;
        }

        throw new Exception\InvalidArgumentException(
            "Provided package is invalid: '{$type}'"
        );
    }

    /**
     * @param $namespace
     *
     * @return string|null
     * @throws Exception\InvalidArgumentException If the namespace is not valid
     */
    public static function validateNamespace($namespace)
    {
        $namespace = rtrim($namespace, '\\');
        if ($namespace === SetupHelper::getNamespace($namespace)) {
            return $namespace;
        }

        throw new Exception\InvalidArgumentException(
            "Provided namespace is invalid: '{$namespace}'"
        );
    }


    /**
     * Verify that a string has no unnecessary quotes or throw an Exception
     *
     * @since 0.1.0
     *
     * @param string $string The string to validate.
     *
     * @return string The validated string.
     * @throws Exception\InvalidArgumentException If the string is quoted or double-quoted.
     */
    public static function validateUnquoted($string)
    {
        if (SetupHelper::getUnquoted($string) === $string) {
            return $string;
        }

        throw new Exception\InvalidArgumentException(
            sprintf(
                'Provided string "%1$s" has unnecessary quotes or double-quotes.',
                $string
            )
        );
    }

    /**
     * Verify that a string is a valid choice
     *
     * @since 0.1.0
     *
     * @param string $string The string to validate.
     *
     * @return string The validated string.
     * @throws Exception\InvalidArgumentException If the string is quoted or double-quoted.
     */
    public static function validateChoice($string)
    {
        $choice = SetupHelper::getLowerCase($string);

        if ($choice === 'yes' || $choice === 'no') {
            return $choice;
        }

        throw new Exception\InvalidArgumentException(
            sprintf(
                'Provided choice "%1$s" is invalid.',
                $string
            )
        );
    }
}
