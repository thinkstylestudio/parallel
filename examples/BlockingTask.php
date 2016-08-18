<?php
namespace Amp\Concurrent\Example;

use Amp\Concurrent\Worker\{ Environment, Task };

class BlockingTask implements Task {
    /**
     * @var callable
     */
    private $function;

    /**
     * @var mixed[]
     */
    private $args;

    /**
     * @param callable $function Do not use a closure or non-serializable object.
     * @param mixed ...$args Arguments to pass to the function. Must be serializable.
     */
    public function __construct(callable $function, ...$args) {
        $this->function = $function;
        $this->args = $args;
    }

    /**
     * {@inheritdoc}
     */
    public function run(Environment $environment) {
        return ($this->function)(...$this->args);
    }
}
