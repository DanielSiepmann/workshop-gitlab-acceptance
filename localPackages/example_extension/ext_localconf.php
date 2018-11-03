<?php

(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Workshop.ExampleExtension',
        'Address',
        [
            'Address' => 'index, edit, update'
        ],
        [
            'Address' => 'update'
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
        mod {
            wizards {
                newContentElement {
                    wizardItems {
                        plugins {
                            elements {
                                exampleElement {
                                    iconIdentifier = content-coffee
                                    title = Example title
                                    description = Example Description
                                    tt_content_defValues {
                                        CType = list
                                        list_type = exampleextension_pluginkey
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    ');
})();
