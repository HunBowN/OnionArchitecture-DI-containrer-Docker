<?php 
namespace Core;

use App\Infrastructure\db\DBConfig;
use App\Infrastructure\DI\DIContainer;
use App\Infrastructure\db\DB;
use App\Infrastructure\db\orm\ORM;
use App\Infrastructure\db\repository\SQLTariffReposiotory;
use App\Infrastructure\controllers\TariffController;
use App\Services\TariffService;


error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('max_execution_time', '0');

require_once($_SERVER["DOCUMENT_ROOT"] . '/app/bootstrap.php');

$container = new DIContainer();

// $container->register(DBConfig::class);
// $container->register(DB::class);
// $container->register(ORM::class);
// $container->register(SQLTariffReposiotory::class);

$tariffService = $container->resolve(TariffService::class, [SQLTariffReposiotory::class]);

$tafiffCtrl = new TariffController($tariffService);

$tafiffCtrl->createTariff();
$tafiffCtrl->updateTariff();

$tariff = $tafiffCtrl->getById(1);
$tariffs = $tafiffCtrl->getAll();

print_r($tariffs);


