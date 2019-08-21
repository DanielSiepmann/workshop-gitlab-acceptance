<?php

return (function (
    $extensionKey = 'example_extension',
    $tableName = 'tx_workshopexampleextension_domain_model_address'
) {
    $extensionLanguagePrefix = 'LLL:EXT:example_extension/Resources/Private/Language/locallang_tca.xlf:';
    $coreLanguagePrefix = 'LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:';

    return [
        'ctrl' => [
            'label' => 'company_name',
            'iconfile' => 'EXT:core/Resources/Public/Icons/T3Icons/content/content-store.svg',
            'default_sortby' => 'company_name',
            'tstamp' => 'tstamp',
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'title' => $extensionLanguagePrefix . 'address',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime'
            ],
            'searchFields' => 'company_name, street, city'
        ],
        'interface' => [
            'showRecordFieldList' => 'company_name, street, house_number, zip, city, country, slug'
        ],
        'palettes' => [
            'address' => [
                'showitem' => implode(',', [
                    'street, house_number',
                    '--linebreak--',
                    'zip, city',
                    '--linebreak--',
                    'country',
                ]),
            ],
        ],
        'types' => [
            '0' => [
                'showitem' => implode(',', [
                    '--div--;' . $coreLanguagePrefix . 'general',
                    'company_name;;address',
                    'slug',
                ]),
            ],
        ],
        'columns' => [
            'company_name' => [
                'label' => $extensionLanguagePrefix . 'company_name',
                'config' => [
                    'type' => 'input',
                    'max' => 255,
                    'eval' => 'trim,required',
                ],
            ],
            'street' => [
                'label' => $extensionLanguagePrefix . 'street',
                'config' => [
                    'type' => 'input',
                    'max' => 255,
                    'eval' => 'trim,required',
                ],
            ],
            'house_number' => [
                'label' => $extensionLanguagePrefix . 'house_number',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'max' => 255,
                    'eval' => 'trim,required',
                ],
            ],
            'zip' => [
                'label' => $extensionLanguagePrefix . 'zip',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'max' => 255,
                    'eval' => 'trim,required',
                ],
            ],
            'city' => [
                'label' => $extensionLanguagePrefix . 'city',
                'config' => [
                    'type' => 'input',
                    'max' => 255,
                    'eval' => 'trim,required',
                ],
            ],
            'country' => [
                'label' => $extensionLanguagePrefix . 'country',
                'config' => [
                    'type' => 'input',
                    'max' => 255,
                    'eval' => 'trim,required',
                ],
            ],
            'slug' => [
                'label' => $extensionLanguagePrefix . 'slug',
                'config' => [
                    'type' => 'slug',
                    'generatorOptions' => [
                        'fields' => ['company_name'],
                        'prefixParentPageSlug' => true,
                    ],
                    'fallbackCharacter' => '-',
                    'eval' => 'uniqueInSite',
                ],
            ],
        ],
    ];
})();
