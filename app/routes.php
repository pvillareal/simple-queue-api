<?php
declare(strict_types=1);

use App\Application\Actions\Task\AddTaskAction;
use App\Application\Actions\Task\CompleteTaskAction;
use App\Application\Actions\Task\GetTaskAction;
use App\Application\Actions\Task\GetTaskDetailsAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->group('/submitter', function (Group $group) {
        $group->post('/{sid}/create', AddTaskAction::class);
    });

    $app->group('/processor', function (Group $group) {
        $group->get('/{pid}/get', GetTaskAction::class);
        $group->put('/{pid}/complete/{tid}', CompleteTaskAction::class);
    });

    $app->group('/task', function (Group $group) {
        $group->get('/{id}', GetTaskDetailsAction::class);
    });
};
