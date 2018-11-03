<?php

namespace Codappix\Tests\Acceptance;

/*
 * Copyright (C) 2018 Daniel Siepmann <coding@daniel-siepmann.de>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301, USA.
 */

use Codeception\Event\TestEvent;
use Codeception\Event\SuiteEvent;
use Codeception\Events;
use PHPUnit\Framework\TestSuite;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\TestingFramework\Core\Acceptance\Extension\BackendEnvironment;

class Typo3Environment extends BackendEnvironment
{
    public function _initialize()
    {
        ArrayUtility::mergeRecursiveWithOverrule($this->config, [
            'typo3DatabaseDriver' => 'pdo_sqlite',
            // 'typo3DatabaseDriver' => 'pdo_mysql',
            // 'typo3DatabaseHost' => 'localhost',
            // 'typo3DatabaseUsername' => 'testing',
            // 'typo3DatabasePassword' => 'testing',
            // 'typo3DatabaseName' => 'workshopgitlabtesting',
            // 'typo3DatabasePort' => '3306',
            'coreExtensionsToLoad' => [
                'core',
                'extbase',
                'fluid',
                'fluid_styled_content',
                'frontend',
                'backend',
            ],
            'testExtensionsToLoad' => [
                'typo3conf/ext/example_extension',
            ],
            'xmlDatabaseFixtures' => [
                dirname(__FILE__) . '/../../acceptance/fixtures/full.xml',
            ],
        ]);

        parent::_initialize();
    }
}
