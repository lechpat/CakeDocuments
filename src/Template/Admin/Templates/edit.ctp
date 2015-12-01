<?php
    $this->Html->script('Email.ckeditor/ckeditor',['block' => true]);
    $this->Html->scriptBlock('
        CKEDITOR.replace("content");
    ',['block' => 'scriptBottom']);
?>
<?php /*
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $template->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $template->id)]
            )
        ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Templates'), ['action' => 'index']) ?></li>
    </ul>
</div>
*/ ?>
<div class="templates form col-md-12 columns">
    <?= $this->Element('Documents.Revisions/index', [
        'id' => $template->id,    # replace with actual entity variable
        'model' => 'documents_templates',  # replace with actual model
        'limit' => 10,          # optional
    ]);?>
    <?= $this->Form->create($template,['align' => 'horizontal']); ?>
    <fieldset>
        <legend><?= __('Edit Document Template') ?></legend>
            <?= $this->Form->input('title') ?>
            <?= $this->Form->input('revision_notes') ?>
            <?= $this->Form->input('content',[
                'templates' => [
                   'formGroup' => '{{label}}{{input}}{{error}}',
                    'label' => '<label class="control-label" {{attrs}}>{{text}}</label>'
                ]
            ]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
