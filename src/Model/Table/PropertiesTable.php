<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PropertiesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('properties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
    }

    //validation
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('beds')
            ->requirePresence('beds', 'create')
            ->notEmptyString('beds');

        $validator
            ->integer('baths')
            ->requirePresence('baths', 'create')
            ->notEmptyString('baths');

        $validator
            ->integer('sqft')
            ->requirePresence('sqft', 'create')
            ->notEmptyString('sqft');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->allowEmptyString('photo');

        return $validator;
    }
}
