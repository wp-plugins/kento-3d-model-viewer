<?php
/*
Plugin Name: Kento 3D Model
Plugin URI: http://kentothemes.com
Description: Display 3D model on wordPress page, post, or custom page, 3D model Rotation, zooming anabled.
Version: 1.0
Author: KentoThemes
Author URI: http://kentothemes.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


/**********************************************************************/
/**************************** for 3d Model  *****************************/
/**********************************************************************/




add_action('init','jsc3d');

function jsc3d() {
    wp_enqueue_script( 'ava-test-js', plugins_url( '/scripts/jsc3d.js', __FILE__ ));
}



function kento_3dmv_shortcode($atts) {

		$atts = shortcode_atts(
			array(
				'width' => '',
				'height' => '',
				'source' => '',
			), $atts);

return "<div style='width:".$atts['width']."; margin:auto; position:relative; font-size: 9pt; color: #777777;'>
		<canvas id='cv' style='border: 1px solid;' width='".$atts['width']."' height='".$atts['height']."' ></canvas>
		
	</div>
	
	<script type='text/javascript'>
	var canvas = document.getElementById('cv');
	var viewer = new JSC3D.Viewer(canvas);
	viewer.setParameter('SceneUrl', '".$atts['source']."');
	viewer.setParameter('InitRotationX', -15);
	viewer.setParameter('InitRotationY', 135);
	viewer.setParameter('InitRotationZ', 0);
	viewer.setParameter('ModelColor', '#57524C');
	viewer.setParameter('BackgroundColor1', '#383840');
	viewer.setParameter('BackgroundColor2', '#000000');
	viewer.setParameter('RenderMode', 'texturesmooth');
	viewer.setParameter('MipMapping', 'on');
	viewer.init();
	viewer.update();
  </script>";
	}
add_shortcode('kento_3dmv', 'kento_3dmv_shortcode');

/* [model_3d width="" height="" source=""  ] 
<?php echo do_shortcode('[model_3d width="" height="" items="" country=""]'); ?>

*/



add_filter('mce_external_plugins', "kento_3dmv_mce_register");
add_filter('mce_buttons', 'kento_3dmv_mce_add_button', 0);
function kento_3dmv_mce_add_button($buttons){
array_push($buttons, "separator", "kento_3dmv_mce_button");
return $buttons;
}
function kento_3dmv_mce_register($plugin_array){
$url = trim(get_bloginfo('url'), "/")."/wp-content/plugins/kento-3d-model-viewer/scripts/editor_plugin.js";
$plugin_array['kento_3dmv_mce_button'] = $url;
return $plugin_array;
}





