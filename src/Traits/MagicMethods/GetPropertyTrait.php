<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Traits\MagicMethods;

trait GetPropertyTrait
{
    /**
     * Magic method to return a property value based on the called method name
     * converting the called method name from PascalCase to snake_case.
     * Example: getPropertyName will return a value from $this->property->property_name
     *
     * Some property might have a manually written method for them
     * to work around the unusual property name and types other than string.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return string|null
     */
    public function __call(string $name, array $arguments): ?string
    {
        if (strpos($name, "get") === 0) {
            $PascalCase = substr($name, 3);
            $snake_case = ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $PascalCase)), '_');
            return $this->property->$snake_case;
        }

        return null;
    }
}