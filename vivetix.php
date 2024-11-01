<?PHP

/*
Plugin Name: VIVETIX
Description: A wordpress plugin to allow the insertion of the vivetix widget.
Version: 1.0
Author: Vivetix
Author URI: https://vivetix.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: vivetix
Domain Path: /languages

VIVETIX is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

VIVETIX is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with VIVETIX. If not, see {License URI}.
*/

function vivetix_shortcode($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'url' => '',
        ),
        $atts
    );

    if (empty($atts['url'])) {
        return '';
    }

    if (!wp_http_validate_url($atts['url'])) {
        return '';
    }

    $html = '<iframe src="'.esc_url($atts['url']).'" width="100%" height="600" frameborder="0" class="video" id="widget-vivetix"></iframe>';
    $html.= '<script type="text/javascript">
        window.addEventListener(\'message\', function(info) {
            var data = info.data;
            document.getElementById(\'widget-vivetix\').style.height = parseInt(data.height) + \'px\';
        });
    </script>';


    return $html;
}

add_shortcode('vivetix', 'vivetix_shortcode');
