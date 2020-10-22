<?php

namespace src\Manufacture\Bakery;

use src\Entity\BaseProduct;
use src\Entity\BaseRequest;
use src\Entity\Product\Pancake;
use src\Manufacture\ManufactureInterface;

class PancakeBakery implements ManufactureInterface
{
    public function produce(BaseRequest $request): BaseProduct
    {
        return new Pancake($request->getIngredients());
    }
}
