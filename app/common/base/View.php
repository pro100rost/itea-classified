<?php

namespace Common\base;

class View
{
    /**
     * @param string $viewFile
     * @param array $params
     *
     * @return string
     *
     * @throws \Throwable
     */
    public function render(string $viewFile, array $params = []): string
    {
        return $this->renderPhpFile($viewFile, $params);
    }

    /**
     * Renders a view file as a PHP script.
     *
     * @param string $_file_ the view file.
     * @param array $_params_ the parameters (name-value pairs) that will be extracted and made available in the view file.
     *
     * @return string the rendering result
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function renderPhpFile($_file_, array $_params_ = [])
    {
        $_obInitialLevel_ = ob_get_level();
        ob_start();
        ob_implicit_flush(false);
        extract($_params_, EXTR_OVERWRITE);
        try {
            require $_file_;
            return ob_get_clean();
        } catch (\Exception $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        } catch (\Throwable $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        }
    }
}