<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Bundle'), ['action' => 'edit', $bundle->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Bundle'), ['action' => 'delete', $bundle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bundle->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Bundles'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Bundle'), ['action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="bundles view col-lg-10 col-md-9">
    <h2><?= h($bundle->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($bundle->name) ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($bundle->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Templates') ?></h4>
    <?php if (!empty($bundle->templates)): ?>
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('Revision Notes') ?></th>
            <th><?= __('Content') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Created By') ?></th>
            <th><?= __('Modified') ?></th>
            <th><?= __('Modified By') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($bundle->templates as $templates): ?>
        <tr>
            <td><?= h($templates->id) ?></td>
            <td><?= h($templates->title) ?></td>
            <td><?= h($templates->revision_notes) ?></td>
            <td><?= h($templates->content) ?></td>
            <td><?= h($templates->created) ?></td>
            <td><?= h($templates->created_by) ?></td>
            <td><?= h($templates->modified) ?></td>
            <td><?= h($templates->modified_by) ?></td>

            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['controller' => 'Templates', 'action' => 'view', $templates->id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Templates', 'action' => 'view', $templates->id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['controller' => 'Templates', 'action' => 'delete', $templates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $templates->id),'title'=> __('Delete'), 'escape' => false]) ?>
                </div>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
