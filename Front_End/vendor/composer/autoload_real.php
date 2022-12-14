<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb5b91cd5abe58b057a01d2debe9f0d09
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitb5b91cd5abe58b057a01d2debe9f0d09', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb5b91cd5abe58b057a01d2debe9f0d09', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb5b91cd5abe58b057a01d2debe9f0d09::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
