<?php

declare(strict_types=1);

namespace App\Controller;

class PropertiesController extends AppController
{
    public function index()
    {
        $query = $this->Properties->find();

        $applyBeds   = $this->request->getQuery('apply_beds');
        $beds        = $this->request->getQuery('beds');

        $applyBaths  = $this->request->getQuery('apply_baths');
        $baths       = $this->request->getQuery('baths');

        $applySqft   = $this->request->getQuery('apply_sqft');
        $sqft        = $this->request->getQuery('sqft');

        $applyPrice  = $this->request->getQuery('apply_price');
        $price       = $this->request->getQuery('price');

        if ($applyBeds === '1' && !empty($beds)) {
            $query->where(['beds >=' => $beds]);
        }
        if ($applyBaths === '1' && !empty($baths)) {
            $query->where(['baths >=' => $baths]);
        }
        if ($applySqft === '1' && !empty($sqft)) {
            $query->where(['sqft >=' => $sqft]);
        }
        if ($applyPrice === '1' && !empty($price)) {
            $query->where(['price <=' => $price]);
        }

        $this->paginate = [
            'limit' => 10,
            'order' => [
                'Properties.id' => 'desc'
            ]
        ];

        $properties = $this->paginate($query);

        $this->set(compact('properties', 'beds', 'baths', 'sqft', 'price'));
    }

    public function add()
    {
        $property = $this->Properties->newEmptyEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());

            //handle upload file
            $file = $this->request->getData('photo');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $filename = time() . '-' . $file->getClientFilename();
                $targetPath = WWW_ROOT . 'uploads' . DS . $filename;
                $file->moveTo($targetPath);

                $property->photo = $filename;
            }

            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $this->set(compact('property'));
    }

    public function search()
    {
        $beds = $this->request->getQuery('beds');
        $baths = $this->request->getQuery('baths');
        $sqft = $this->request->getQuery('sqft');
        $price = $this->request->getQuery('price');


        if (empty($beds) && empty($baths) && empty($sqft) && empty($price)) {
            $properties = [];
        } else {
            $query = $this->Properties->find();

            if (!empty($beds)) {
                $query->where(['beds >=' => $beds]);
            }
            if (!empty($baths)) {
                $query->where(['baths >=' => $baths]);
            }
            if (!empty($sqft)) {
                $query->where(['sqft >=' => $sqft]);
            }
            if (!empty($price)) {
                $query->where(['price >=' => $price]);
            }

            $properties = $this->paginate($query);
        }

        $this->set(compact('properties'));

        //debug($this->request->getQuery());
    }

    public function view($id = null)
    {
        $property = $this->Properties->get($id, contain: []);
        $this->set(compact('property'));
    }

    public function edit($id = null)
    {
        $property = $this->Properties->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $this->set(compact('property'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
