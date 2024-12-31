<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Property extends Entity
{
    protected array $_accessible = [
        'beds' => true,
        'baths' => true,
        'sqft' => true,
        'price' => true,
        'photo' => true,
        'created' => true,
        'modified' => true,
    ];
}
