<?php

namespace ClientControllers;

use ClientModels\repositories\ChatRepository;
use Common\base\Controller;
use Common\base\Request;

class ChatController extends Controller
{
    private $repository;

    public function __construct(string $side, Request $request)
    {
        parent::__construct($side, 'chat', $request);
        $this->setLayout('logged-layout');
        $this->repository = new ChatRepository();
    }

    /**
     * @return string
     *
     * @throws \Throwable
     */
    public function actionCreate()
    {

    }

    public function actionView()
    {
        if ($this->request->isPost()) {
            // TODO: add login logic
        }
        return $this->render('message');
    }
}