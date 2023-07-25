<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite4f7f7348c759de5ee1370faca4bbcdd
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hamiddj\\SmartTicket\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hamiddj\\SmartTicket\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite4f7f7348c759de5ee1370faca4bbcdd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite4f7f7348c759de5ee1370faca4bbcdd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite4f7f7348c759de5ee1370faca4bbcdd::$classMap;

        }, null, ClassLoader::class);
    }
}