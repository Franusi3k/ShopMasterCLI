<?php

namespace App\Core;

use ReflectionClass;

class CliContainer
{
    public function resolve(string $controllerClass): object
    {
        $ref = new ReflectionClass($controllerClass);
        $constructor = $ref->getConstructor();
        $dependencies = [];

        if ($constructor !== null) {
            $params = $constructor->getParameters();
            foreach ($params as $param) {
                $type = $param->getType();
                if (!$type->isBuiltin()) {
                    $dependencies[] = $this->resolve($type->getName());
                }
            }
        }

        return $ref->newInstanceArgs($dependencies);
    }
}
