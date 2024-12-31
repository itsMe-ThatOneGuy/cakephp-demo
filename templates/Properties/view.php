<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="properties view content">
            <table>
                <div>
                    <?php if (!empty($property->photo)): ?>
                        <img src="<?= $this->Url->build('/uploads/' . $property->photo) ?>" alt="Property Photo" style="max-width:200px;">
                    <?php endif; ?>
                </div>
                <tr>
                    <th><?= __('Beds') ?></th>
                    <td><?= $this->Number->format($property->beds) ?></td>
                </tr>
                <tr>
                    <th><?= __('Baths') ?></th>
                    <td><?= $this->Number->format($property->baths) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sqft') ?></th>
                    <td><?= $this->Number->format($property->sqft) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td>$<?= $this->Number->format($property->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($property->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($property->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
