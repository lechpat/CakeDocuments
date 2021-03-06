<?php

namespace Documents\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Behavior;
use Cake\ORM\TableRegistry;

class RevisionsBehavior extends Behavior{
	
	
	/**
	 * Use config to specify the Models you want to watch, and the fields you want to monitor
	 * @var array
	 */
	public $_config = [
		'watch' => [ ],	# (whitelist) only watch these fields
		'ignore' => [ ], # (blacklist) modifications to these fields will be ignored
	];

	/**
	 * Save the before and after state of the modified entity to the Revisions table.
	 * 
	 * @param  Event  $event  [description]
	 * @param  Entity $entity [description]
	 * @return void
	 */
	public function afterSave( Event $event, Entity $entity){

		# get the current configuration
		$config = $this->config();

		# pessimistic - expect not to have to update anything
		$trigger = false;

		# if watch is set, use it 
		switch (true):
            # always save a revision
            case $entity->isNew():
                $trigger = true;
                break;
			# if `watch` is set AND one of the fields we're watching has been changed, trigger a save
			case (!empty($config['watch'])):
				$trigger = !empty($entity->extractOriginalChanged($config['watch']));
				break;

			# if `ignore` is set AND at least one other non-ignored field was changed, trigger a save
			case (!empty($config['ignore'])):			
				$trigger = !empty(array_diff($entity->extractOriginalChanged($this->_table->schema()->columns()), $entity->extractOriginalChanged($config['ignore'])));
				break;

			# if SOMETHING changed, and we're not explicity watching or ignoring anything, trigger anyway
			default:
				$trigger = $entity->dirty() || $entity->isNew();
				break;
		endswitch;
		# if we don't need to trigger a save, stop
		if(!$trigger):
			return;
		endif;

		# rebuild the original entity
		$before = $this->_table->patchEntity($before = clone $entity, $before->extractOriginal($this->_table->schema()->columns()));

		# load the Revisions Model
		$this->Revisions = TableRegistry::get('Documents.Revisions');

		# build the Revision record
		$r = $this->Revisions->newEntity([
			'model' => $this->_table->table(),
			'modelPrimaryKey' => $entity->get($this->_table->primaryKey()),
			'before_edit' => json_encode($before),
			'after_edit' => json_encode($entity),
			]);

		# and save it
		$this->Revisions->save($r);

	}	
	
	public function getRevisions($id){
		$this->Revisions = TableRegistry::get('Documents.Revisions');
		$revisions = $this->Revisions->find('all')
				->where(['Revisions.modelPrimaryKey' => $id]);
		return $revisions;
	}


}
