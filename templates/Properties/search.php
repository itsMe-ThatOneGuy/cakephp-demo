<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property[]|\Cake\Collection\CollectionInterface $properties
 * @var string|null $beds
 * @var string|null $baths
 * @var string|null $sqft
 * @var string|null $price
 */
?>
<div class="properties index content">

    <h3><?= __('Search Properties') ?></h3>
    <?= $this->Form->create(null, [
        'type' => 'get',
        'url' => ['action' => 'search'] // or 'index' if your search is in the index action
    ]) ?>
    <div>
        <?= $this->Form->control('beds', [
            'label' => 'Minimum Beds',
            'value' => $beds ?? ''
        ]) ?>
    </div>
    <div>
        <?= $this->Form->control('baths', [
            'label' => 'Minimum Baths',
            'value' => $baths ?? ''
        ]) ?>
    </div>
    <div>
        <?= $this->Form->control('sqft', [
            'label' => 'Minimum sqft',
            'value' => $sqft ?? ''
        ]) ?>
    </div>
    <div>
        <?= $this->Form->control('price', [
            'label' => 'Maximum Price',
            'value' => $price ?? ''
        ]) ?>
    </div>
    <?= $this->Form->button(__('Search'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>

    <?php if (!empty($properties)): ?>
        <h3><?= __('Search Results') ?></h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('beds') ?></th>
                        <th><?= $this->Paginator->sort('baths') ?></th>
                        <th><?= $this->Paginator->sort('sqft') ?></th>
                        <th><?= $this->Paginator->sort('price') ?></th>
                        <th><?= $this->Paginator->sort('photo') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= $this->Paginator->sort('modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($properties as $property): ?>
                        <tr>
                            <td><?= $this->Number->format($property->beds) ?></td>
                            <td><?= $this->Number->format($property->baths) ?></td>
                            <td><?= $this->Number->format($property->sqft) ?></td>
                            <td>$<?= $this->Number->format($property->price) ?></td>
                            <td><?= h($property->photo) ?></td>
                            <td><?= h($property->created) ?></td>
                            <td><?= h($property->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $property->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p>
                <?= $this->Paginator->counter(
                    __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')
                ) ?>
            </p>
        </div>
    <?php else: ?>
        <p><?= __('No properties found.') ?></p>
    <?php endif; ?>

</div>
