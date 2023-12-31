<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2064a0129feef1181b3f4de5b81603b4
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'VNCHub\\Mvc\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'VNCHub\\Mvc\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit2064a0129feef1181b3f4de5b81603b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2064a0129feef1181b3f4de5b81603b4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2064a0129feef1181b3f4de5b81603b4::$classMap;

        }, null, ClassLoader::class);
    }
}
