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
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(trim('
        @import "EXT:example_extension/Configuration/TypoScript/*.typoscript"
    '));

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
        mod {
            wizards {
                newContentElement {
                    wizardItems {
                        common {
                            show = *
                            elements {
                                exampleElement {
                                    iconIdentifier = content-store
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
