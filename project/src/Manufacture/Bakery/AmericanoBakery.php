<?php

namespace src\Manufacture\Bakery;

use src\Entity\BaseProduct;
use src\Entity\BaseRequest;
use src\Entity\Ingredient\Milk;
use src\Entity\Product\Americano;
use src\Manufacture\ManufactureInterface;

class AmericanoBakery implements ManufactureInterface
{
    public function produce(BaseRequest $request): BaseProduct
    {
        return new Americano($request->getIngredients());
    }
}
