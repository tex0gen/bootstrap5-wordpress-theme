<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4da39393fa208a5fc3e082016e2c293c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'StoutLogic\\AcfBuilder\\' => 22,
        ),
        'D' => 
        array (
            'Doctrine\\Inflector\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'StoutLogic\\AcfBuilder\\' => 
        array (
            0 => __DIR__ . '/..' . '/stoutlogic/acf-builder/src',
        ),
        'Doctrine\\Inflector\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4da39393fa208a5fc3e082016e2c293c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4da39393fa208a5fc3e082016e2c293c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4da39393fa208a5fc3e082016e2c293c::$classMap;

        }, null, ClassLoader::class);
    }
}