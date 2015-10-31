<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27.09.14
 * Time: 22:08
 */

define('ENVIRONMENT_CORE', 'Development');
define('GRAYLOG_HOST', '192.168.2.20');

//define('ENVIRONMENT_CORE', 'Testing');
//define('ENVIRONMENT_CORE', 'Production');

define('PATH_CORE_BASE', dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
define('DEFAULT_ENCODING', 'UTF-8');
define('PATH_CORE_FONT', PATH_CORE_BASE . 'font' . DIRECTORY_SEPARATOR);
define('PATH_CORE_SRC', PATH_CORE_BASE . 'src' . DIRECTORY_SEPARATOR);
define('PATH_CORE_CLASSES', PATH_CORE_SRC . 'classes' . DIRECTORY_SEPARATOR);
define('PATH_CLASSES', PATH_CORE_CLASSES);
define('PATH_META', PATH_CORE_BASE . 'meta' . DIRECTORY_SEPARATOR);
define('PATH_CORE_CONFIG', PATH_CORE_BASE . 'config' . DIRECTORY_SEPARATOR);
define('PATH_CORE_HELPERS', PATH_CORE_CLASSES . 'Helpers' . DIRECTORY_SEPARATOR);
define('PATH_BIN', PATH_CORE_BASE . 'bin' . DIRECTORY_SEPARATOR);
define('PATH_CORE_MODULE', PATH_CORE_CLASSES . 'Modules' . DIRECTORY_SEPARATOR);
define('PATH_ONPHP_CORE', PATH_CORE_BASE . '..' . DIRECTORY_SEPARATOR . 'onPhp' . DIRECTORY_SEPARATOR . 'onphp-framework' . DIRECTORY_SEPARATOR);
define('PATH_ONPHP_UTILS', PATH_CORE_BASE . '..' . DIRECTORY_SEPARATOR . 'onPhp' . DIRECTORY_SEPARATOR . 'onPHPUtils' . DIRECTORY_SEPARATOR);

ini_set(
    'include_path', get_include_path() . PATH_SEPARATOR
    . PATH_CORE_CLASSES . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'DAOs' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Flow' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Business' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Exceptions' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Proto' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Enumeration' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Base' . PATH_SEPARATOR
    . PATH_BIN . PATH_SEPARATOR
    . PATH_CORE_HELPERS . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Auto' . DIRECTORY_SEPARATOR . 'Business' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Auto' . DIRECTORY_SEPARATOR . 'Proto' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Auto' . DIRECTORY_SEPARATOR . 'DAOs' . PATH_SEPARATOR
    . PATH_CORE_SRC . 'exceptions' . PATH_SEPARATOR
    . PATH_CORE_SRC . 'interfaces' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Processors' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Request' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Response' . PATH_SEPARATOR
    . PATH_CORE_CLASSES . 'Utils' . PATH_SEPARATOR
);

require_once(PATH_ONPHP_CORE . 'global.inc.php');
require_once(PATH_ONPHP_UTILS . 'src' . DIRECTORY_SEPARATOR . 'include.inc.php');


AutoloaderClassPathCache::create()
    ->setNamespaceResolver(NamespaceResolverOnPHP::create())
    ->addPaths(explode(PATH_SEPARATOR, get_include_path()))
    ->register();

//DBPool::me()
//    ->setDefault(
//        DB::spawn(
//            'PgSQL',
//            'dewid',
//            'dewid',
//            'localhost',
//            'ked'
//        )
//            ->setEncoding(DEFAULT_ENCODING)
//    );

DBPool::me()
    ->setDefault(
        DB::spawn(
            'PgSQL',
            'ked',
            'dewid',
            'localhost',
            'aked'
        )
            ->setEncoding(DEFAULT_ENCODING)
    );





