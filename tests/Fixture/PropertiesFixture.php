<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertiesFixture
 */
class PropertiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'beds' => 1,
                'baths' => 1,
                'sqft' => 1,
                'price' => 1.5,
                'photo' => 'Lorem ipsum dolor sit amet',
                'created' => 1735580139,
                'modified' => 1735580139,
            ],
        ];
        parent::init();
    }
}
