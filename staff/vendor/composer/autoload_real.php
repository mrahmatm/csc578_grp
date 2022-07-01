<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7a4ee3a0c257fa78f0e9d0c4a3bd8cbb
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

        spl_autoload_register(array('ComposerAutoloaderInit7a4ee3a0c257fa78f0e9d0c4a3bd8cbb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7a4ee3a0c257fa78f0e9d0c4a3bd8cbb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7a4ee3a0c257fa78f0e9d0c4a3bd8cbb::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit7a4ee3a0c257fa78f0e9d0c4a3bd8cbb::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire7a4ee3a0c257fa78f0e9d0c4a3bd8cbb($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire7a4ee3a0c257fa78f0e9d0c4a3bd8cbb($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}