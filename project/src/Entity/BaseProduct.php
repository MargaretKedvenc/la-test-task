<?php

namespace src\Entity;

abstract class BaseProduct
{
    const NAME_PANCAKE = 'pancake';
    const NAME_AMERICANO = 'americano';

    /** @var array */
    protected $ingredients = [];

    /**
     * @param array $ingredients
     */
    public function __construct(array $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return string
     */
    abstract public function getName(): string;

    /**
     * @return array
     */
    abstract public function getReceiptIngredients(): array;

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        if (count($this->getReceiptIngredients()) !== count($this->ingredients)) {
            return false;
        }

        foreach ($this->getReceiptIngredients() as $ingredientName => $className) {
            if (!isset($this->getIngredients()[$ingredientName]) || get_class($this->getIngredients()[$ingredientName]) !== $className) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }
}
