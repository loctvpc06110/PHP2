<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderIniteb8eb4a6433972c99ef01143da637a91
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderIniteb8eb4a6433972c99ef01143da637a91', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderIniteb8eb4a6433972c99ef01143da637a91', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticIniteb8eb4a6433972c99ef01143da637a91::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
