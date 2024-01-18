<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d798b060ce4a329540e0e68da2c1cbb
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d798b060ce4a329540e0e68da2c1cbb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d798b060ce4a329540e0e68da2c1cbb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2d798b060ce4a329540e0e68da2c1cbb::$classMap;

        }, null, ClassLoader::class);
    }
}
