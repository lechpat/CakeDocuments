<?php
    $this->Html->script('Email.ckeditor/ckeditor',['block' => true]);
    $this->Html->scriptBlock('
        CKEDITOR.replace("content");
    ',['block' => 'scriptBottom']);
?>
<div class="templates form col-md-12 columns">
    <?= $this->Form->create($template,['align' => 'horizontal']); ?>
    <fieldset>
        <legend><?= __('Create New Document Template') ?></legend>
            <?= $this->Form->input('id',['type'=>'text','label' => 'Identifier','required' => true]) ?>
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
