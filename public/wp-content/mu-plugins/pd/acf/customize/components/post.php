<?php

namespace PD\ACF\Customize\Components\Post;

use function PD\ACF\Utils\acf_typography_fields;

function fields () {
  return [
    [
      'key' => 'field_components_post_accordion',
      'label' => 'Post',
      'type' => 'accordion',
      'open' => 0,
      'multi_expand' => 1,
      'show_in_graphql' => 1,
    ],
    [
      'key' => 'field_components_post_group',
      'name' => 'post',
      'type' => 'group',
      'show_in_graphql' => 1,
      'layout' => 'block',
      'sub_fields' => [
        [
          'key' => 'field_components_post_date_tab',
          'label' => 'Date',
          'type' => 'tab',
          'show_in_graphql' => 1,
        ],
        [
          'key' => 'field_components_post_date_style_accordion',
          'label' => 'Style',
          'type' => 'accordion',
          'open' => 0,
          'multi_expand' => 1,
        ],
        [
          'key' => "field_components_post_date_border_color",
          'label' => 'Border Color',
          'name' => "components_post_date_border_color",
          'graphql_field_name' => 'dateBorderColor',
          'type' => 'select',
          'show_in_graphql' => 1,
          'ui' => 1,
          'wrapper' => [
	    'width' => 25
          ],
        ],
        [
	  'key' => 'field_components_post_date_desktop',
	  'name' => 'desktop',
          'label' => 'Desktop',
	  'type' => 'group',
	  'show_in_graphql' => 1,
	  'layout' => 'block',
	  'sub_fields' => [
            ...acf_typography_fields([
              'key' => 'field_components_post_date_desktop_regular',
              'name' => 'components_post_date_desktop_regular',
              'graphql_field_name' => 'regular',
              'label' => 'Regular',
              'defaults' => [
                'font_family' => 'primary',
                'font_size' => 15,
                'letter_spacing' => 0,
                'line_height' => 1.6,
                'font_weight' => 300,
                'text_transform' => 'none'
              ]                       
            ]),
          ]
        ],
        [
	  'key' => 'field_components_post_date_mobile',
	  'name' => 'mobile',
          'label' => 'Mobile',
	  'type' => 'group',
	  'show_in_graphql' => 1,
	  'layout' => 'block',
	  'sub_fields' => [
            ...acf_typography_fields([
              'key' => 'field_components_post_date_mobile_regular',
              'name' => 'components_post_date_mobile_regular',
              'graphql_field_name' => 'regular',
              'label' => 'Regular',
              'defaults' => [
                'font_family' => 'primary',
                'font_size' => 15,
                'letter_spacing' => 0,
                'line_height' => 1.6,
                'font_weight' => 300,
                'text_transform' => 'none'
              ]                       
            ]),
          ]
        ],                      
        [
          'key' => 'field_modules_post_date_style_accordion_end',
          'label' => 'Accordion End',
          'type' => 'accordion',
          'endpoint' => 1,            
        ],
      ]
    ], 
  ];
}
