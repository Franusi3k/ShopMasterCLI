<?php

namespace App\Core;

class CliKernel
{
    public function handle(array $argv)
    {
        if (!isset($argv[1])) {
            echo "No command provided\n";
            return;
        }

        $parts = explode(':', $argv[1]);

        if (count($parts) !== 2) {
            echo "Invalid command format. Use module:action (e.g. product:list)\n";
            return;
        }

        [$module, $action] = $parts;

        if ($module === '' || $action === '') {
            echo "Invalid command: module and action cannot be empty\n";
            return;
        }

        $args = array_slice($argv, 2);

        $controllerClass = "App\Modules\\" . ucfirst($module) . "\Controllers\\" . ucfirst($module) . "Controller";

        if (!class_exists($controllerClass)) {
            echo "Unkown module '$module' \n";
            return;
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            echo "Unkown action '$action' for module $module \n";
            return;
        }

        call_user_func_array([$controller, $action], $args);
    }
}
