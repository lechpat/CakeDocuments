<?php
namespace Documents\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Documents\Model\Table\BundlesTemplatesTable;

/**
 * Documents\Model\Table\BundlesTemplatesTable Test Case
 */
class BundlesTemplatesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.documents.bundles_templates',
        'plugin.documents.bundles',
        'plugin.documents.templates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BundlesTemplates') ? [] : ['className' => 'Documents\Model\Table\BundlesTemplatesTable'];
        $this->BundlesTemplates = TableRegistry::get('BundlesTemplates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BundlesTemplates);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
