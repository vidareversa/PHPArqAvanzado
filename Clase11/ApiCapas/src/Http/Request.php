<?php

namespace App\Http;

class Request
{
    private $_uri;
    private $_method;
    private $_headers;
    private $_body;

    public function __construct($uri = '/', $method = 'GET', $headers = [], $body = '')
    {
        $this->_uri = $uri;
        $this->_method = $method;
        $this->_headers = $headers;
        $this->_body = $body;
    }

    public function uri() { return $this->_uri; }
    public function method() { return $this->_method; }
    public function headers() { return $this->_headers; }
    public function body() { return $this->_body; }

    public function uriStartsWith($search) { return substr($this->_uri, 0, strlen($search)) === $search; }

    public function fromGlobal() {
        $this->_uri = $_SERVER['REQUEST_URI'];
        $this->_method = $_SERVER['REQUEST_METHOD'];
        $this->_headers = apache_request_headers();
        $this->_body = file_get_contents('php://input');

        return $this;
    }
}