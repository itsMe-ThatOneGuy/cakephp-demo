<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Property> $properties
 * @var string|null $beds
 * @var string|null $baths
 * @var string|null $sqft
 * @var string|null $price
 * @var string|null $apply_beds
 * @var string|null $apply_baths
 * @var string|null $apply_sqft
 * @var string|null $apply_price
 */
?>
<div class="properties index content">
    <button type="button" class="button" onclick="toggleSearchForm()">
        <?= __('Toggle Search') ?>
    </button>

    <div id="searchForm" style="display:none; margin-top: 1rem;">
        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>

        <div style="margin-bottom: 1rem;">
            <?= $this->Form->checkbox('apply_beds', [
                'value' => '1',
                'checked' => !empty($apply_beds),
            ]) ?>
            <?= $this->Form->label('apply_beds', 'Filter by Min Beds?') ?>

            <?= $this->Form->control('beds', [
                'label' => 'Minimum Beds',
                'value' => $beds ?? '',
                'type'  => 'number',
                'min'   => 0
            ]) ?>
        </div>

        <div style="margin-bottom: 1rem;">
            <?= $this->Form->checkbox('apply_baths', [
                'value' => '1',
                'checked' => !empty($apply_baths),
            ]) ?>
            <?= $this->Form->label('apply_baths', 'Filter by Min Baths?') ?>

            <?= $this->Form->control('baths', [
                'label' => 'Minimum Baths',
                'value' => $baths ?? '',
                'type'  => 'number',
                'min'   => 0
            ]) ?>
        </div>

        <div style="margin-bottom: 1rem;">
            <?= $this->Form->checkbox('apply_sqft', [
                'value' => '1',
                'checked' => !empty($apply_sqft),
            ]) ?>
            <?= $this->Form->label('apply_sqft', 'Filter by Min Sqft?') ?>

            <?= $this->Form->control('sqft', [
                'label' => 'Minimum Sqft',
                'value' => $sqft ?? '',
                'type'  => 'number',
                'min'   => 0
            ]) ?>
        </div>

        <div style="margin-bottom: 1rem;">
            <?= $this->Form->checkbox('apply_price', [
                'value' => '1',
                'checked' => !empty($apply_price),
            ]) ?>
            <?= $this->Form->label('apply_price', 'Filter by Max Price?') ?>

            <?= $this->Form->control('price', [
                'label' => 'Maximum Price',
                'value' => $price ?? '',
                'type'  => 'number',
                'min'   => 0
            ]) ?>
        </div>

        <?= $this->Form->button(__('Apply Filters'), ['class' => 'button']) ?>

        <?= $this->Form->end() ?>
    </div>

    <?= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <h3><?= __('Properties') ?></h3>
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
</div>

<script>
    function toggleSearchForm() {
        const formDiv = document.getElementById('searchForm');
        formDiv.style.display = (formDiv.style.display === 'none' || formDiv.style.display === '') ?
            'block' :
            'none';
    }
</script>
