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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $property->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $property->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="properties form content">
            <?= $this->Form->create($property) ?>
            <fieldset>
                <legend><?= __('Edit Property') ?></legend>
                <?php
                    echo $this->Form->control('beds');
                    echo $this->Form->control('baths');
                    echo $this->Form->control('sqft');
                    echo $this->Form->control('price');
                    echo $this->Form->control('photo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
