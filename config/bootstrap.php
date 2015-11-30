<?php

use Cake\Database\Type;

/**
 * Load the json database type
 * @see RevisionsTable
 */
Type::map('json', 'Documents\Database\Type\JsonType');
