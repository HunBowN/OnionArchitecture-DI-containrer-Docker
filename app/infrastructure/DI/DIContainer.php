<?php
namespace App\Infrastructure\DI;

class DIContainer
{

    private static $services = [];

    public static function register(string $service): void
    {
        self::$services[$service] = fn() => new $service();
    }

    public function get(string $key)
    {
        if (!isset(self::$services[$key])) {
            throw new \Exception("Binding {$key} not found");
        }
        $factory = self::$services[$key];
        return $factory();
    }

    public function resolve(string $class, $params = [])
    {

        try {
            $reflector = new \ReflectionClass($class);
        } catch (\Exception $e) {
            throw new \Exception("Target class [$class] does not exist.", 0, $e);
        }

        if (!$reflector->isInstantiable()) {
            throw new \Exception("Target class [$class] is not instantiable.");
        }

        $constructor = $reflector->getConstructor();

        if (empty($constructor)) {
            return new $class();
        }

        $dependencies = [];

        if ($params) {
            foreach ($params as $param) {
                $dependencies[] = $this->resolve($param);
            }
        } else {

            $parameters = $constructor->getParameters();

            foreach ($parameters as $parameter) {
                $type = $parameter->getType();

                $name = $type->getName();

                try {
                    $dependency = $this->resolve($name);
                    $dependencies[] = $dependency;
                } catch (\Exception $e) {
                    if ($parameter->isOptional()) {
                        $dependencies[] = $parameter->getDefaultValue();
                    } else {
                        $dependency = $this->resolve($parameter->getType()->getName());
                        $this->register($name);
                        $dependencies[] = $dependency;
                    }
                }
            }
        }
        return $reflector->newInstanceArgs($dependencies);

    }
}