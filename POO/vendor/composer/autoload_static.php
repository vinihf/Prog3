<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit44cf2cbc8299bc0db4fc36c913c4f4ed
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
        'App\\Veiculos\\Veiculo' => __DIR__ . '/../..' . '/App/Veiculos/Veiculo.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit44cf2cbc8299bc0db4fc36c913c4f4ed::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit44cf2cbc8299bc0db4fc36c913c4f4ed::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit44cf2cbc8299bc0db4fc36c913c4f4ed::$classMap;

        }, null, ClassLoader::class);
    }
}
