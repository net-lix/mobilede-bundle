<?php

$GLOBALS['TL_DCA']['tl_mobile_ad'] = [
    'config' => [
        'dataContainer' => 'Table',
        'switchToEdit' => true,
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ]
        ]
    ],
    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['name'],
            'headerFields' => ['name'],
            'flag' => 1,
            'panelLayout' => 'debug;filter;sort,search,limit',
        ],
        'label' => [
            'fields' => ['name'],
            'format' => '%s',
            'showColumns' => true,
        ],
        'global_operations' => [
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['edit'],
                'href' => 'table=tl_mobile_ad',
                'icon' => 'edit.gif'
            ],
            'editheader' => [
                'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['editheader'],
                'href' => 'act=edit',
                'icon' => 'header.gif',
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif',
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ]
    ],
    'palettes' => [
        '__selector__' => [],
        'default' => '{title_legend},name,alias,type;{price_legend},dealer_price_amount,consumer_price_amount,price_vatable,price_included_delivery_costs,price_vat_rating,price_currency;{vehicle_legend},vehicle_class,vehicle_category,vehicle_make,vehicle_model,vehicle_model_description,vehicle_damage_and_unrepaired,vehicle_accident_damaged,vehicle_roadworthy;{general_legend},images,creation_date,modification_date,detail_page,seller_inventory_key;{specifics_legend},specifics_exterior_color,specifics_manufacturer_color_name,specifics_mileage,specifics_exhaust_inspection,specifics_general_inspection,specifics_door_count,specifics_first_registration,specifics_emission_class,specifics_emission_sticker,specifics_fuel,specifics_power,specifics_kba,specifics_schwacke_code,specifics_gearbox,specifics_climatisation,specifics_licensed_weight,specifics_axles,specifics_load_capacity,specifics_num_seats,specifics_operating_hours,specifics_installation_height,specifics_lifting_capacityspecifics_lifting_height,specifics_construction_year,specifics_construction_date,specifics_cubic_capacity,specifics_driving_mode,specifics_driving_cab,specifics_condition,specifics_usage_type,specifics_delivery_date,specifics_delivery_period,specifics_wheel_formula,specifics_number_of_bunks,specifics_hydraulic_installation,specifics_europallet_storage_spaces,specifics_dimension_length,specifics_dimension_width,specifics_dimension_height,specifics_shipping_volume,specifics_loading_space,specifics_identification_number,specifics_interior_color,specifics_interior_type,specifics_airbag,specifics_number_of_previous_owners,specifics_countryVersion,specifics_videoUrl,specifics_parking_assistants,specifics_used_car_seal,specifics_speed_control,specifics_radio,specifics_daytime_running_lamps,specifics_sliding_door_type,specifics_headlight_type,specifics_bending_lights_type,specifics_breakdown_service,specifics_battery,specifics_trailer_coupling_type,specifics_trim_line,specifics_model_range,specifics_first_models_production_date,specifics_battery_capacity;{emission_fuel_consumption_legend},emission_fuel_consumption_envkv_compliant,emission_fuel_consumption_energy_efficiency_class,emission_fuel_consumption_co2_emission,emission_fuel_consumption_inner,emission_fuel_consumption_outer,emission_fuel_consumption_combined,emission_fuel_consumption_petrol_type,emission_fuel_consumption_combined_power_consumption'
    ],
    'subpalettes' => [
        '' => ''
    ],
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['name'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'alias' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['alias'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => ['rgxp' => 'alias', 'unique' => true, 'maxlength' => 128, 'tl_class' => 'w50'],
            'save_callback' => [
                function ($varValue, DataContainer $dataContainer) {
                    return \System::getContainer()->get('pdir.mobile_de.ad_service')->generateAlias($varValue, $dataContainer);
                }
            ],
            'sql' => "varchar(128) COLLATE utf8_bin NOT NULL default ''"
        ],
        'dealer_price_amount' => array
        (
            'label'  => &$GLOBALS['TL_LANG']['tl_mobile_ad']['dealer_price_amount'],
            'exclude' => true,
            'inputType' => 'text',
            'eval' => array('maxlength'=>13, 'rgxp'=>'digit', 'tl_class' => 'w50'),
            'sql' => "float(10,2) NOT NULL default '0.00'"
        ),
        'consumer_price_amount' => array
        (
            'label'  => &$GLOBALS['TL_LANG']['tl_mobile_ad']['consumer_price_amount'],
            'exclude' => true,
            'inputType' => 'text',
            'eval' => array('maxlength'=>13, 'rgxp'=>'digit', 'tl_class' => 'w50'),
            'sql' => "float(10,2) NOT NULL default '0.00'"
        ),
        'price_vatable' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['price_vatable'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'checkbox',
            'eval' => ['mandatory' => false, 'tl_class' => 'w50'],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'price_included_delivery_costs' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['price_included_delivery_costs'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'checkbox',
            'eval' => ['mandatory' => false, 'tl_class' => 'w50'],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'price_vat_rating' => array
        (
            'label'  => &$GLOBALS['TL_LANG']['tl_mobile_ad']['price_vat_rating'],
            'exclude' => true,
            'inputType' => 'text',
            'eval' => array('maxlength'=>13, 'rgxp'=>'digit', 'tl_class' => 'w50'),
            'sql' => "float(10,2) NOT NULL default '0.00'"
        ),
        'price_currency' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['price_currency'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'type' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['type'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'inputType' => 'select',
            'options' => $GLOBALS['TL_LANG']['tl_mobile_ad']['type']['options'],
            'eval' => array(
                'includeBlankOption'=>false,
                'tl_class'=>'w50',
                'readonly'=> true
            ),
            'save_callback' => [
                function ($varValue, DataContainer $dataContainer) {
                    return \System::getContainer()->get('pdir.mobile_de.ad_service')->generateAlias($varValue, $dataContainer);
                }
            ],
            'sql' => "varchar(4) NOT NULL default 'man'"
        ],
        'creation_date' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['creation_date'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'modification_date' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['modification_date'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'detail_page' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['detail_page'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'seller_inventory_key' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['seller_inventory_key'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'vehicle_class' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['vehicle_class'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'vehicle_category' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['vehicle_category'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'vehicle_make' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['vehicle_make'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'vehicle_model' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['vehicle_model'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'vehicle_model_description' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['vehicle_model_description'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'clr', 'rte'=>'tinyMCE'],
            'sql' => "text NULL"
        ],
        'vehicle_damage_and_unrepaired' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['vehicle_damage_and_unrepaired'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'checkbox',
            'eval' => ['mandatory' => false],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'vehicle_accident_damaged' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['vehicle_accident_damaged'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'checkbox',
            'eval' => ['mandatory' => false],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'vehicle_roadworthy' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['vehicle_roadworthy'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'checkbox',
            'eval' => ['mandatory' => false],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'specifics_exterior_color' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_exterior_color'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_manufacturer_color_name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_manufacturer_color_name'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_mileage' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_mileage'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_exhaust_inspection' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_exhaust_inspection'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_general_inspection' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_general_inspection'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_door_count' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_door_count'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_first_registration' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_first_registration'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_emission_class' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_emission_class'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_emission_sticker' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_emission_sticker'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_fuel' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_fuel'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_power' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_power'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_kba' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_kba'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_schwacke_code' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_schwacke_code'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_gearbox' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_gearbox'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_climatisation' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_climatisation'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_licensed_weight' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_licensed_weight'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_axles' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_axles'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_load_capacity' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_load_capacity'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_num_seats' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_num_seats'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_operating_hours' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_operating_hours'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_installation_height' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_installation_height'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_lifting_capacity' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_lifting_capacity'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_lifting_height' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_lifting_height'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_construction_year' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_construction_year'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_construction_date' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_construction_date'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_cubic_capacity' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_cubic_capacity'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_driving_mode' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_driving_mode'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_driving_cab' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_driving_cab'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_condition' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_condition'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_usage_type' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_usage_type'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_delivery_date' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_delivery_date'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_delivery_period' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_delivery_period'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_wheel_formula' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_wheel_formula'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_number_of_bunks' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_number_of_bunks'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_hydraulic_installation' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_hydraulic_installation'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_europallet_storage_spaces' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_europallet_storage_spaces'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_dimension_length' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_dimension_length'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_dimension_width' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_dimension_width'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_dimension_height' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_dimension_height'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_shipping_volume' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_shipping_volume'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_loading_space' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_loading_space'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_identification_number' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_identification_number'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_interior_color' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_interior_color'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_interior_type' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_interior_type'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_airbag' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_airbag'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_number_of_previous_owners' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_number_of_previous_owners'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_countryVersion' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_countryVersion'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_videoUrl' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_videoUrl'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_parking_assistants' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_parking_assistants'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_used_car_seal' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_used_car_seal'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_speed_control' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_speed_control'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_radio' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_radio'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_daytime_running_lamps' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_daytime_running_lamps'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_sliding_door_type' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_sliding_door_type'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_headlight_type' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_headlight_type'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_bending_lights_type' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_bending_lights_type'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_breakdown_service' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_breakdown_service'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_battery' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_battery'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_trailer_coupling_type' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_trailer_coupling_type'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_trim_line' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_trim_line'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_model_range' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_model_range'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_first_models_production_date' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_first_models_production_date'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'specifics_battery_capacity' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['specifics_battery_capacity'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'emission_fuel_consumption_envkv_compliant' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['emission_fuel_consumption_envkv_compliant'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'emission_fuel_consumption_energy_efficiency_class' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['emission_fuel_consumption_energy_efficiency_class'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'emission_fuel_consumption_co2_emission' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['emission_fuel_consumption_co2_emission'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'emission_fuel_consumption_inner' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['emission_fuel_consumption_inner'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'emission_fuel_consumption_outer' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['emission_fuel_consumption_outer'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'emission_fuel_consumption_combined' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['emission_fuel_consumption_combined'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'emission_fuel_consumption_petrol_type' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['emission_fuel_consumption_petrol_type'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'emission_fuel_consumption_combined_power_consumption' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['emission_fuel_consumption_combined_power_consumption'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'images' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['images'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'fileTree',
            'eval' => ['mandatory' => false, 'tl_class' => 'clr', 'multiple'=>true, 'fieldType'=>'checkbox', 'files'=>true, 'orderField'=>'orderSRC'],
            'sql' => "blob NULL"
        ],
        'orderSRC' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mobile_ad']['orderSRC'],
            'sql' => "blob NULL"
        ],
    ]
];
