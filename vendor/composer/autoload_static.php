<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6908cc0149d6586f07cea8cd13cf30bc
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Project\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Project\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6908cc0149d6586f07cea8cd13cf30bc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6908cc0149d6586f07cea8cd13cf30bc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6908cc0149d6586f07cea8cd13cf30bc::$classMap;

        }, null, ClassLoader::class);
    }
}
