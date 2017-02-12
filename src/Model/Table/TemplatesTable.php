<?php
namespace Documents\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Documents\Model\Entity\Template;

/**
 * Templates Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Revisions
 */
class TemplatesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('documents_templates');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Josegonzalez/Version.Version',[
            'versionTable' => 'documents_versions'
        ]);
//        $this->addBehavior('Documents.Revisions', [
//            'ignore' => [
//                'created',  # OTHER than these fields 
//                'modified', # was changed
//                'created_by',
//                'modified_by'
//            ],
//        ]);        

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('revision_notes');

        $validator
            ->allowEmpty('content');

        $validator
            ->add('created_by', 'valid', ['rule' => 'uuid'])
            ->allowEmpty('created_by');

        $validator
            ->add('modified_by', 'valid', ['rule' => 'uuid'])
            ->allowEmpty('modified_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        return $rules;
    }
}
