<?php
require 'vendor/autoload.php';

use DevCoder\Route;
use Ramaadi\Karyawanapp\Controllers\EmployeeController;
use Ramaadi\Karyawanapp\Controllers\EmployeeLocationController;
use Ramaadi\Karyawanapp\Controllers\HomepageController;
use Ramaadi\Karyawanapp\Controllers\OfficeController;
use Ramaadi\Karyawanapp\Internal\Enums;
use Ramaadi\Karyawanapp\Internal\SessionFlashStorage;
use Spatie\Ignition\Ignition;

session_start();

//Ignition::make()->register();

SessionFlashStorage::hydrate(
    errors: $_SESSION[Enums::ERRORS_SESSION_NAME] ?? [],
    flash: $_SESSION[Enums::FLASH_SESSION_NAME] ?? []
);

if (!isset($_SESSION[Enums::KEYCOUNTER_NAME])) $_SESSION[Enums::KEYCOUNTER_NAME] = [];

$routes = new DevCoder\Router([
    Route::get('index', '/', [HomepageController::class, 'index']),
    Route::get('employee_index', '/employees', [EmployeeController::class, 'index']),
    Route::post('employee_create', '/employees/submit', [EmployeeController::class, 'create']),
    Route::get('employee_edit', '/employees/{id}/edit', [EmployeeController::class, 'edit']),
    Route::post('employee_update', '/employees/{id}/edit', [EmployeeController::class, 'update']),
    Route::post('employee_delete', '/employees/{id}/delete', [EmployeeController::class, 'delete']),

    Route::get('office_view', '/offices', [OfficeController::class, 'index']),
    Route::post('office_create', '/offices/submit', [OfficeController::class, 'create']),
    Route::get('office_edit', '/offices/{id}/edit', [OfficeController::class, 'edit']),
    Route::post('office_update', '/offices/{id}/edit', [OfficeController::class, 'update']),
    Route::post('office_delete', '/offices/{id}/delete', [OfficeController::class, 'delete']),

    Route::get('locations_view', '/locations', [EmployeeLocationController::class, 'index']),
    Route::post('locations_create', '/locations/create', [EmployeeLocationController::class, 'create']),
    Route::post('locations_delete', '/locations/{id}/delete', [EmployeeLocationController::class, 'delete']),


    Route::get('debug_sess', '/session-debug', [HomepageController::class, 'debugSession']),
]);


$route = $routes->matchFromPath($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

$routeHandler = $route->getHandler();
$routeAttributes = $route->getAttributes();

$controllerName = $routeHandler[0];
$methodName = $routeHandler[1] ?? null;

$controller = new $controllerName();
if (!is_callable($controller)) {
    $controller = [$controller, $methodName];
}

echo $controller(...array_values($routeAttributes));