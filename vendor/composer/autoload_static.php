<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdd8eae90fa614b5aa9507cd082e17ce6
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdd8eae90fa614b5aa9507cd082e17ce6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdd8eae90fa614b5aa9507cd082e17ce6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
