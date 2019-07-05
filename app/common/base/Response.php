<?php

namespace Common\base;

class Response
{
    private $content;

    /**
     * Sends the response to client.
     */
    public function send()
    {
        $this->sendContent();
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * Sends the response content to the client.
     */
    private function sendContent()
    {
        echo $this->content;

        return;
    }
}