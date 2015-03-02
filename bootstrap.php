<?php
/**
 * This is application bootstrap file.
 *
 * It is responsible for loading application namespaces and
 * doctrine namespaces
 *
 * author: michal<at>zagalski.pl
 */

/**
 * load autoload script, if it exists, otherwise end the execution
 */
if(!file_exists('vendor/autoload.php')) {
    die('doctrine autoload file is missing...');
}
require_once 'vendor/autoload.php';

/**
 * get setup, and em classes
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use League\Plates\Engine;
    
/**
 * set development mode true
 */
$isDevMode = true;
/**
 * define paths to enteties
 */
$paths = array('/models');
/**
 * define db params
 */
$dbParams = array(
    'driver'    => 'pdo_mysql',
    'user'      => '',
    'password'  => '',
    'dbname'    => '',
);

/**
 * call static method to create metadata configuration
 */
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
/**
 * create entity manager with db params and metadata configuration
 */
$entityManager = EntityManager::create($dbParams, $config);
/**
 * create template engine
 */
$templates = new Engine(getcwd().'/views');