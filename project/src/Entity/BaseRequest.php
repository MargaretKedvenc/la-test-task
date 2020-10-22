<?php

namespace src\Entity;

class BaseRequest
{
    /** @var string */
    protected $productName;

    /** @var array|null */
    protected $ingredients = null;

    /**
     * @param string $productName
     * @param array|null $ingredients
     */
    public function __construct(string $productName, ?array $ingredients)
    {
        $this->productName = $productName;
        $this->ingredients = $ingredients;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @return array|null
     */
    public function getIngredients(): ?array
    {
        return $this->ingredients;
    }
}
