<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9ed609fc077a7aa3a35408268618cc6
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPAutoUpdates\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPAutoUpdates\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'WPAutoUpdates\\Admin\\AutoUpdatesAdmin' => __DIR__ . '/../..' . '/src/Admin/AutoUpdatesAdmin.php',
        'WPAutoUpdates\\EnableAutoUpdate' => __DIR__ . '/../..' . '/src/EnableAutoUpdate.php',
        'WPAutoUpdates\\WPAdminPage\\AdminPage' => __DIR__ . '/../..' . '/src/WPAdminPage/AdminPage.php',
        'WPAutoUpdates\\WPAdminPage\\FormHelper' => __DIR__ . '/../..' . '/src/WPAdminPage/FormHelper.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb9ed609fc077a7aa3a35408268618cc6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb9ed609fc077a7aa3a35408268618cc6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb9ed609fc077a7aa3a35408268618cc6::$classMap;

        }, null, ClassLoader::class);
    }
}
