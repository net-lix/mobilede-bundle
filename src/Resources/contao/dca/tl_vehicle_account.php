<?php

declare(strict_types=1);

$strTable = 'tl_vehicle_account';

$GLOBALS['TL_DCA'][$strTable] = [
    // Config
    'config' => [
        'dataContainer' => 'Table',
        'switchToEdit' => true,
        'enableVersioning' => true,
    ],

    // List
    'list' => [
        'sorting' => [
            'mode' => 2,
            'fields' => ['description'],
            'flag' => 1,
            'panelLayout' => 'sort,search,limit',
        ],
        'label' => [
            'fields' => [''],
        ],
        'global_operations' => [],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG'][$strTable]['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.svg',
            ],
            'enable' => [
                'label' => &$GLOBALS['TL_LANG'][$strTable]['enable'],
                'attributes' => 'onclick="Backend.getScrollOffset();"',
                'haste_ajax_operation' => [
                    'field' => 'enabled',
                    'options' => [
                        [
                            'value' => '0',
                            'icon' => 'invisible.svg',
                        ],
                        [
                            'value' => '1',
                            'icon' => 'visible.svg',
                        ],
                    ],
                ],
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG'][$strTable]['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.svg',
            ],
        ],
    ],

    // Select
    'select' => [
        'buttons_callback' => [],
    ],

    // Edit
    'edit' => [
        'buttons_callback' => [],
    ],

    // Palettes
    'palettes' => [
        '__selector__' => [],
        'default' => '{basic_legend},api_type,description;' .
            '{credentials_legend},api_explanation,api_user_key,api_user_secret,mobilede_customer_number;' .
            '{sync_legend},enabled;',
    ],

    // Subpalettes
    'subpalettes' => [
        'api_type_mobilede' => '{credentials_legend},api_explanation,api_user_key,api_user_secret,api_mobilede_customer_number;' .
            '{sync_legend},enabled;',
        'api_type_syscara' => '{credentials_legend},url;{sync_legend},enabled;',
    ],

    // Fields
    'fields' => [
        'id' => [
        ],
        'tstamp' => [
        ],
        'description' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'unique' => true],
        ],
        'api_type' => [
            'exclude' => true,
            'inputType' => 'select',
            'eval' => ['includeBlankOption' => true, 'tl_class' => 'w50']
        ],
        'api_explanation' => [
            'exclude' => true,
            'input_field_callback' => static function (Contao\DataContainer $dc) {
                return sprintf(
                    '<div class="widget"><p class="tl_info">%s</p></div>',
                    $GLOBALS['TL_LANG'][$strTable]['api_explanation']
                );
            },
        ],
        'api_user_key' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50', 'preserveTags' => true],
        ],
        'api_user_secret' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50', 'preserveTags' => true],
        ],
        'mobilede_customer_number' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50', 'preserveTags' => true],
        ],
        'enabled' => [
            'exclude' => true,
            'default' => false,
            'inputType' => 'checkbox',
            'eval' => ['isBoolean' => true],
            'save_callback' => [
                static function ($value) {
                    return '1' === $value;
                },
            ],
        ],
    ],
];
