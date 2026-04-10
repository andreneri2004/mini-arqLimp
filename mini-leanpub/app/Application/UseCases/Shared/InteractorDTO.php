<?php

namespace Minileanpub\Application\UseCases\Shared;

abstract class InteractorDTO
{
    public function getData(): array
    {

        $reflex = new \ReflectionClass($this);
        
        $props = $reflex->getProperties(\ReflectionProperty::IS_PUBLIC);

        $propsValues = [];
        foreach ($props as $prop) {
            $name = $prop->getName();
            $propsValues[$name] = $prop->getValue($this);
        }

        return $propsValues;
    }
}
