<?php

namespace ClientRouters;

use ClientControllers\AdController;
use ClientControllers\UserController;
use ClientControllers\ChatController;
use Common\base\Controller;
use Common\base\Request;

/**
 * @property Request request
 */
class Router
{
    private const ACTION = 'action';

    private $request;
    private static $configs = [
        [
            'path' => '/',
            'pattern' => '/^\/$/u',
            'controller' => AdController::class,
            'methods' => ['GET'],
            'action' => 'Index',
        ],
        [
            'path' => '/ads/<id:\d+>',
            'pattern' => '/^\/ads\/(?P<id>\d+)$/u',
            'controller' => AdController::class,
            'methods' => ['GET'],
            'action' => 'View',
        ],
        [
            'path' => '/ads/create',
            'pattern' => '/^\/ads\/create$/u',
            'controller' => AdController::class,
            'methods' => ['GET', 'POST'],
            'action' => 'Create',
        ],
        [
            'path' => '/ads/update/<id:\d+>',
            'pattern' => '/^\/ads\/update\/(?P<id>\d+)$/u',
            'controller' => AdController::class,
            'methods' => ['GET', 'POST'],
            'action' => 'Update',
        ],
        [
            'path' => '/ads/deactivate/<id:\d+>',
            'pattern' => '/^\/ads\/deactivate\/(?P<id>\d+)$/u',
            'controller' => AdController::class,
            'methods' => ['POST'],
            'action' => 'Deactivate',
        ],
        [
            'path' => '/registration',
            'pattern' => '/^\/registration/u',
            'controller' => UserController::class,
            'methods' => ['GET', 'POST'],
            'action' => 'Registration',
        ],
        [
            'path' => '/login',
            'pattern' => '/^\/login$/u',
            'controller' => UserController::class,
            'methods' => ['GET', 'POST'],
            'action' => 'Login',
        ],
        [
            'path' => '/account',
            'pattern' => '/^\/account/u',
            'controller' => UserController::class,
            'methods' => ['GET', 'POST'],
            'action' => 'Settings',
        ],
        [
            'path' => '/logout',
            'pattern' => '/^\/logout$/u',
            'controller' => UserController::class,
            'methods' => ['GET'],
            'action' => 'Logout',
        ],
        [
            'path' => '/message',
            'pattern' => '/^\/message/u',
            'controller' => ChatController::class,
            'methods' => ['GET', 'POST'],
            'action' => 'View',
        ],
    ];

    /**
     * Router constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(): string
    {
        $pathInfo = $this->request->getPathInfo();

        foreach (self::$configs as $configName => $config) {
            if (! preg_match($config['pattern'], $pathInfo, $matches)) {
                continue;
            }
            if (! \in_array($this->request->getMethod(), $config['methods'], true)) {
                continue;
            }
            $controllerName = $config['controller'];
            /** @var Controller $controller */
            $controller = new $controllerName('client', $this->request);

            return $controller->{self::ACTION . $config['action']}($matches['id'] ?? null);
        }

        return (new AdController('client', $this->request))->{self::ACTION . 'Index'}();
    }
}