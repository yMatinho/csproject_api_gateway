<?php

namespace App\Core\Redis;

use Predis\Client;

class RedisFacade {
    private Client $redis;
    public function __construct() {
        $this->redis = new Client([
            'host'   => REDIS_HOST,
            'port'   => REDIS_PORT,
        ]);
    }

    public function exists($key) {
        return $this->redis->exists($key);
    }

    public function get($key) {
        return $this->redis->get($key);
    }

    public function set($key, $value) {
        return $this->redis->set($key, $value);
    }

    public function delete($key) {
        return $this->redis->del($key);
    }
}