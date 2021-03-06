<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitca1d687cc559e4c38a6f848ddb1babbc
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dmitriy\\ManaoLogin\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dmitriy\\ManaoLogin\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitca1d687cc559e4c38a6f848ddb1babbc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitca1d687cc559e4c38a6f848ddb1babbc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitca1d687cc559e4c38a6f848ddb1babbc::$classMap;

        }, null, ClassLoader::class);
    }
}
