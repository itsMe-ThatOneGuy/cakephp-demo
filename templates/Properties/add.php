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
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="properties form content">
            <?= $this->Form->create($property, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Property') ?></legend>
                <?php
                echo $this->Form->control('beds');
                echo $this->Form->control('baths');
                echo $this->Form->control('sqft');
                echo $this->Form->control('price');
                echo $this->Form->control('photo', ['type' => 'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
