<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb4117c702734cc5d9a85b4cd0b7af144
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Models',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Models\\RespuestaGeneral' => __DIR__ . '/../..' . '/app/Models/RespuestaGeneral.php',
        'Models\\RespuestaGetUsers' => __DIR__ . '/../..' . '/app/Models/RespuestaGetUsers.php',
        'Models\\RespuestaGetUsersInfo' => __DIR__ . '/../..' . '/app/Models/RespuestaGetUsersInfo.php',
        'Models\\RespuestaSetUser' => __DIR__ . '/../..' . '/app/Models/RespuestaSetUser.php',
        'Models\\RespuestaSetUserInfo' => __DIR__ . '/../..' . '/app/Models/RespuestaSetUserInfo.php',
        'Models\\RespuestaUpdateUser' => __DIR__ . '/../..' . '/app/Models/RespuestaUpdateUser.php',
        'Models\\User' => __DIR__ . '/../..' . '/app/Models/User.php',
        'Models\\UserInfo' => __DIR__ . '/../..' . '/app/Models/UserInfo.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb4117c702734cc5d9a85b4cd0b7af144::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb4117c702734cc5d9a85b4cd0b7af144::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb4117c702734cc5d9a85b4cd0b7af144::$classMap;

        }, null, ClassLoader::class);
    }
}