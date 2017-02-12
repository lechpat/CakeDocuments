<?php
namespace Documents\Model\Entity;

use Cake\ORM\Entity;
use \Josegonzalez\Version\Model\Behavior\Version\VersionTrait;
/**
 * Template Entity.
 *
 * @property string $id
 * @property string $title
 * @property string $revision_id
 * @property \Documents\Model\Entity\Revision $revision
 * @property string $revision_notes
 * @property string $content
 * @property \Cake\I18n\Time $created
 * @property string $created_by
 * @property \Cake\I18n\Time $modified
 * @property string $modified_by
 */
class Template extends Entity
{
    use VersionTrait;
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

    private $vars;

    public function build($entity)
    {
        $vars = $entity->toArray();
        $this->setVars($vars);
        return $this->replace();
    }

    public function setVars($vars)
    {
        $this->vars = $vars;
    }

    public function getTemplateText()
    {
        return $this->content;
    }

    public function replace()
    {
        return strtr($this->getTemplateText(), $this->getReplacementPairs());
    }

    private function getReplacementPairs()
    {
        $pairs = [];
        foreach ($this->vars as $name => $value) {
            if(is_object($name)) { continue; }
            $key = sprintf('##%s##', strtoupper($name));
            $pairs[$key] = (string)$value;
        }
        return $pairs;
    }
}
