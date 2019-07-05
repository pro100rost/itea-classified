<?php

namespace Common\base;

class Controller
{
    private $_side;
    private $_id;
    private $_view;
    private $_viewPath;
    private $_mainLayout = 'main-layout';
    private $_layoutPath;
    protected $request;

    public function __construct(string $side, string $id, Request $request)
    {
        $this->_side = $side;
        $this->_id = $id;
        $this->request = $request;
    }

    /**
     * Renders a view with applying layout.
     *
     * @param string $view
     * @param array $params
     *
     * @return string
     *
     * @throws \Throwable
     */
    public function render(string $view, array $params = []): string
    {
        $viewFile = $this->findViewFile($view);
        $content = $this->getView()->render($viewFile, $params);

        return $this->renderContent($content);
    }

    /**
     * Renders a view without applying layout.
     *
     * @param string $view
     * @param array $params
     *
     * @return string
     *
     * @throws \Throwable
     */
    public function renderPartial(string $view, array $params = []): string
    {
        $viewFile = $this->findViewFile($view);

        return $this->getView()->render($viewFile, $params);
    }

    /**
     * @param string $content the static string being rendered
     *
     * @return string
     *
     * @throws \Throwable
     */
    public function renderContent(string $content): string
    {
        $layoutFile = $this->findLayoutFile();

        return $this->getView()->render($layoutFile, ['content' => $content]);
    }

    /**
     * @param View $view
     */
    public function setView(View $view): void
    {
        $this->_view = $view;
    }

    /**
     * @param string $layout
     */
    protected function setLayout(string $layout)
    {
        $this->_mainLayout = $layout;
    }

    /**
     * @return string
     */
    private function getViewPath(): string
    {
        if ($this->_viewPath === null) {
            $this->_viewPath = __DIR__ . '/../../' . $this->_side . '-side/views/' . $this->_id . 's/';
        }

        return $this->_viewPath;
    }

    /**
     * @param string $view
     *
     * @return string
     */
    private function findViewFile(string $view): string
    {
        return $this->getViewPath() . $view . '.php';
    }

    /**
     * @return View
     */
    private function getView(): View
    {
        if ($this->_view === null) {
            $this->_view = new View();
        }

        return $this->_view;
    }

    /**
     * @return string
     */
    private function getLayoutPath(): string
    {
        if ($this->_layoutPath === null) {
            $this->_layoutPath = __DIR__ . '/../../' . $this->_side . '-side/views/' . 'layouts/';
        }

        return $this->_layoutPath;
    }

    /**
     * @return string
     */
    private function findLayoutFile(): string
    {
        return $this->getLayoutPath() . $this->_mainLayout . '.php';
    }
}