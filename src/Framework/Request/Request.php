<?php

namespace Framework\Request;

abstract class Request {
    
    protected array $headers;
    public function __construct(
        protected array $values
    ) {
        $this->headers = getallheaders();
    }

    public function __get(string $name) {
        return isset($this->values[$name]) ? $this->values[$name] : null;
    }

    public function getValues(): array {
        return $this->values;
    }

    public function header(string $name): mixed {
        return $this->headers[$name];
    }

    public function hasHeader(string $name): bool {
        return isset($this->headers[$name]);
    }
}