<?php

use src\Entity\BaseProduct;
use src\Entity\BaseRequest;
use src\Exceptions\DoesNotProducedException;
use src\Manufacture\Bakery\AmericanoBakery;
use src\Manufacture\Bakery\Bakery;
use src\Manufacture\Bakery\PancakeBakery;

function myAutoLoad($className)
{
    $classPieces = explode("\\", $className);
    switch ($classPieces[0]) {
        case 'src':
            include __DIR__ .'/'. implode(DIRECTORY_SEPARATOR, $classPieces) . '.php';
            break;
    }
}
spl_autoload_register('myAutoLoad', '', true);

$productName = $argv[1];
unset($argv[0], $argv[1]);

$ingredients = $argv;

$request = new BaseRequest($productName, $ingredients);


try {
    switch ($productName) {
        case BaseProduct::NAME_PANCAKE:
            $bakery = new PancakeBakery();
            break;
        case BaseProduct::NAME_AMERICANO:
            $bakery = new AmericanoBakery();
            break;
        default:
            throw new DoesNotProducedException('Invalid product');
    }

    $product = $bakery->produce($request);

    if (!$product->isCompleted()) {
        throw new DoesNotProducedException('Ingredients missing');
    }

} catch (DoesNotProducedException $exception) {
    echo "{$productName} was not completed because of {$exception->getReason()}";
}
