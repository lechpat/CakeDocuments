<?php
namespace Documents\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Documents\Model\Entity\BundlesTemplate;

/**
 * BundlesTemplates Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Bundles
 * @property \Cake\ORM\Association\BelongsTo $Templates
 */
class BundlesTemplatesTable extends Table
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

        $this->table('documents_bundles_templates');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Bundles', [
            'foreignKey' => 'bundle_id',
            'className' => 'Documents.Bundles'
        ]);
        $this->belongsTo('Templates', [
            'foreignKey' => 'template_id',
            'className' => 'Documents.Templates'
        ]);
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['bundle_id'], 'Bundles'));
        $rules->add($rules->existsIn(['template_id'], 'Templates'));
        return $rules;
    }
}
