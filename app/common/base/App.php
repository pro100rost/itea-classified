<?php

namespace Common\base;

use ClientRouters\Router;

class App
{
    public function run()
    {
        $response = $this->handleRequest(new Request());
        $response->send();
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function handleRequest(Request $request): Response
    {
        $router = new Router($request);
        $content = $router->handle();
        $response = new Response();
        $response->setContent($content);

        return $response;
    }
}
