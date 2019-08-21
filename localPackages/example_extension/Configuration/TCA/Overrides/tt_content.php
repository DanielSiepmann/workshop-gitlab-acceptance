<?php

(function ($extensionKey, $tableName) {
    $langPath = 'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang.xlf:' . $tableName . '.';

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Workshop.ExampleExtension',
        'Address',
        'Address Plugin',
        'content-store'
    );

    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA'][$tableName],
        [
            'ctrl' => [
                'typeicon_classes' => [
                    'exampleextension_address' => 'content-store',
                ],
            ],
            'types' => [
                'exampleextension_address' => [
                    'showitem' => implode(',', [
                        // phpcs:disable Generic.Files.LineLength.TooLong
                        // Keep original code from ext:frontend
                        '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general',
                            '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general',
                            '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers',
                            'pages;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:pages.ALT.list_formlabel',
                            'recursive,',
                        '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access',
                        '--palette--;;hidden',
                        '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access',
                        // phpcs:enable
                    ]),
                ],
            ],
        ]
    );
})('example_extension', 'tt_content');
