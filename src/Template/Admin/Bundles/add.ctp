<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('List Bundles'), ['action' => 'index']) ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="bundles form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($bundle); ?>
    <fieldset>
        <legend><?= __('Add Bundle') ?></legend>
            <?= $this->Form->input('name') ?>
            <?= $this->Form->input('templates._ids', ['options' => $templates,'multiple' => 'checkbox']) ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
