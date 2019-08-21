<?php

if (getenv('TYPO3_ADDITIONAL_CONFIGURATION')) {
    require_once getenv('TYPO3_ADDITIONAL_CONFIGURATION');
}

$appContext = \TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext();
if ((string) $appContext === 'Testing/Acceptance') {
    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TYPO3_CONF_VARS'],
        [
            'SYS' => [
                'trustedHostsPattern' => 'localhost:8080',
            ],
            'DB' => [
                'Connections' => [
                    'Default' => [
                        'dbname' => 'own_workshopgitlabacceptance_testing',
                    ],
                ],
            ],
        ]
    );
}
if ((string) $appContext === 'Testing/Acceptance' && getenv('CI') === 'true') {
    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TYPO3_CONF_VARS'],
        [
            'SYS' => [
                'trustedHostsPattern' => getenv('TESTING_DOMAIN'),
            ],
            'DB' => [
                'Connections' => [
                    'Default' => [
                        'dbname' => 'dev',
                        'password' => 'dev',
                        'user' => 'dev',
                        'host' => 'mysql',
                    ],
                ],
            ],
        ]
    );
}
