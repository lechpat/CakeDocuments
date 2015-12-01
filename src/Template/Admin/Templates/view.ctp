<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Template'), ['action' => 'edit', $template->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Template'), ['action' => 'delete', $template->id], ['confirm' => __('Are you sure you want to delete # {0}?', $template->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Templates'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Template'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="templates view col-lg-10 col-md-9">
    <h2><?= h($template->title) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= h($template->id) ?></p>
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($template->title) ?></p>
            <h6 class="subheader"><?= __('Created By') ?></h6>
            <p><?= h($template->created_by) ?></p>
            <h6 class="subheader"><?= __('Modified By') ?></h6>
            <p><?= h($template->modified_by) ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Version Id') ?></h6>
            <p><?= $this->Number->format($template->version_id) ?></p>
        </div>
        <div class="col-lg-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($template->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($template->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <h6 class="subheader"><?= __('Version Notes') ?></h6>
            <?= $this->Text->autoParagraph(h($template->version_notes)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <h6 class="subheader"><?= __('Content') ?></h6>
            <?= $this->Text->autoParagraph(h($template->content)); ?>

        </div>
    </div>
</div>
