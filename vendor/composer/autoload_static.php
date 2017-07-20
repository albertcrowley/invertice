<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3fa30b35e1aacaeafa34e6ed5ed7ef3a
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Screen\\' => 7,
        ),
        'J' => 
        array (
            'Jenssegers\\ImageHash\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Screen\\' => 
        array (
            0 => __DIR__ . '/..' . '/microweber/screen/src',
        ),
        'Jenssegers\\ImageHash\\' => 
        array (
            0 => __DIR__ . '/..' . '/jenssegers/imagehash/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3fa30b35e1aacaeafa34e6ed5ed7ef3a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3fa30b35e1aacaeafa34e6ed5ed7ef3a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
