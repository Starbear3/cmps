<?php 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

$theme_supports	= array(
	'logo' 				=> true,
	'slider' 			=> false,
	'counter' 			=> true,
	'subscribe' 		=> true,
	'social' 			=> true,
	'footer' 			=> true,
	'special_effects'	=> false,
);


if (isset($_POST['niteoCS_active_color_'.$themeslug])) {
	update_option('niteoCS_active_color['.$themeslug.']', sanitize_hex_color($_POST['niteoCS_active_color_'.$themeslug]));
}

if (isset($_POST['niteoCS_font_color_'.$themeslug])) {
	update_option('niteoCS_font_color['.$themeslug.']', sanitize_hex_color($_POST['niteoCS_font_color_'.$themeslug]));
}

$banner_type 			= get_option('niteoCS_banner', '1');

$contact_content    	= stripslashes(get_option('niteoCS_contact_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'));
$contact_title      	= get_option('niteoCS_contact_title', 'Quick Contacts');
$contact_email      	= get_option('niteoCS_contact_email', 'john.doe@email.com');
$contact_phone      	= get_option('niteoCS_contact_phone', '+123456789');

$active_color			= get_option('niteoCS_active_color['.$themeslug.']', '#0099aa');
$font_color				= get_option('niteoCS_font_color['.$themeslug.']', '#7a7a7a');

$heading_font = array(
    'family'        => get_option('niteoCS_font_headings['.$themeslug.']', 'Concert One'),
    'variant'       => get_option('niteoCS_font_headings_variant['.$themeslug.']', '700'),
    'size'          => get_option('niteoCS_font_headings_size['.$themeslug.']', '35'),
    'spacing'       => get_option('niteoCS_font_headings_spacing['.$themeslug.']', '0'),
);

$content_font = array(
    'family'        => get_option('niteoCS_font_content['.$themeslug.']', 'Poppins'),
    'variant'       => get_option('niteoCS_font_content_variant['.$themeslug.']', 'regular'),
    'size'          => get_option('niteoCS_font_content_size['.$themeslug.']', '15'),
    'spacing'       => get_option('niteoCS_font_content_spacing['.$themeslug.']', '0'),
    'line-height'   => get_option('niteoCS_font_content_lineheight['.$themeslug.']', '1.5'),
);

$heading_font['variant'] = ($heading_font['variant'] =='regular')  ? '400' : $heading_font['variant'];
$heading_font['variant'] = ($heading_font['variant'] =='italic')   ? '400' : $heading_font['variant'];
$content_font['variant'] = ($content_font['variant'] =='regular') ? '400' : $content_font['variant'];
$content_font['variant'] = ($content_font['variant'] =='italic')  ? '400' : $content_font['variant'];
$heading_font_style =  preg_split('/(?<=[0-9])(?=[a-z]+)/i', $heading_font['variant']); 
$content_font_style =  preg_split('/(?<=[0-9])(?=[a-z]+)/i', $content_font['variant']);