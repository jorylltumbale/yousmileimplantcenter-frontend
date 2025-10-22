<?php

namespace PD\ACF\Customize\Modules\HTML;

function fields ( $key, $label ) {
  return [
    [
      'key' => "field_modules_html_accordion_{$key}",
      'label' => "HTML",
      'type' => 'accordion',
      'open' => 0,
      'multi_expand' => 1,
      'show_in_graphql' => 1,
    ],
    [
      'key' => "field_modules_html_group_{$key}",
      'name' => "html_{$key}",
      'type' => 'group',
      'show_in_graphql' => 1,
      'layout' => 'block',
      'sub_fields' => [
        [
          'key' => "field_modules_html_text_tab_{$key}",
          'label' => 'Text',
          'type' => 'tab',
          'show_in_graphql' => 1,
        ],
        [
          'key' => "field_modules_html_headline_color_{$key}",
          'label' => 'Headline Color',
          'name' => "modules_html_headline_color_{$key}",
          'graphql_field_name' => 'headlineColor',
          'type' => 'select',
          'show_in_graphql' => 1,
          'ui' => 1,
          'wrapper' => [
	          'width' => 33.33
          ],
        ],   
        [
          'key' => "field_modules_html_headline_color_bold_{$key}",
          'label' => 'Headline Color (Bold)',
          'name' => "modules_html_headline_color_bold_{$key}",
          'graphql_field_name' => 'headlineColorBold',
          'type' => 'select',
          'show_in_graphql' => 1,
          'ui' => 1,
          'wrapper' => [
	          'width' => 33.33
          ],
        ],   
        [
          'key' => "field_modules_html_body_color_{$key}",
          'label' => 'Body Color',
          'name' => "modules_html_body_color_{$key}",
          'graphql_field_name' => 'bodyColor',
          'type' => 'select',
          'show_in_graphql' => 1,
          'ui' => 1,
          'wrapper' => [
	          'width' => 33.33
          ],
        ],                                                  
      ]
    ],
    [
      'key' => "field_modules_html_accordion_end_{$key}",
      'label' => 'Accordion End',
      'type' => 'accordion',
      'endpoint' => 1,            
    ],
  ];
}
