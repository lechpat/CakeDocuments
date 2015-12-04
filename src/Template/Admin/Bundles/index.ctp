<div class="bundles index col-md-12 panel panel-default">
    <div class="table-responsive">
    <table class="table table-condensed" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($bundles as $bundle): ?>
        <tr>
            <td><?= $this->Number->format($bundle->id) ?></td>
            <td><?= h($bundle->name) ?></td>
            <td class="actions">
                <div class="btn-group btn-group-sm">
                    <?= $this->Html->link('<i class="fa fa-search"></i>', ['action' => 'view', $bundle->id], ['title'=> __('View'), 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $bundle->id], ['title'=> __('Edit'), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['action' => 'delete', $bundle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bundle->id),'title'=> __('Delete'), 'escape' => false]) ?>
                </div>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    </div>
    <div class="paginator clearfix">
        <ul class="pagination pagination-sm pull-right">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p class="text-muted" style="position:absolute;bottom:0;"><small><?= $this->Paginator->counter() ?></small></p>
    </div>
</div>
