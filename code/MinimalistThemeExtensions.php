<?php

/**
 * 
 *
 * @author <marcus@silverstripe.com.au>
 * @license BSD License http://www.silverstripe.org/bsd-license
 */
class PageControllerThemeExtension extends Extension {
	public function onBeforeInit() {
		if (Config::inst()->get('SSViewer', 'theme') == 'ssau-minimalist') {
			Requirements::block(THIRDPARTY_DIR .'/jquery/jquery.js');
			Requirements::javascript('frontend-dashboards/javascript/jquery-1.10.2.min.js');
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-cookie/jquery.cookie.js');
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery-ui.js');
			Requirements::javascript('frontend-dashboards/javascript/jquery-migrate-1.2.1.min.js');
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-entwine/dist/jquery.entwine-dist.js');
			Requirements::block('frontend-dashboards/javascript/dashboards.js');
			Requirements::javascript('themes/ssau-minimalist/js/modernizr.js');
			Requirements::javascript('themes/ssau-minimalist/js/foundation.min.js');
		}
	}
}
