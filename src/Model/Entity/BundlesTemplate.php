<?php
namespace Documents\Model\Entity;

use Cake\ORM\Entity;

/**
 * BundlesTemplate Entity.
 *
 * @property int $id
 * @property int $bundle_id
 * @property \Documents\Model\Entity\Bundle $bundle
 * @property string $template_id
 * @property \Documents\Model\Entity\Template $template
 */
class BundlesTemplate extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
