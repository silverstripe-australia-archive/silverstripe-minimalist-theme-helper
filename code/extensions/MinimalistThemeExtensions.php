<?php

/**
 * 
 *
 * @author <marcus@silverstripe.com.au>
 * @license BSD License http://www.silverstripe.org/bsd-license
 */
class PageControllerThemeExtension extends Extension {

	private static $include_requirements = true;

	private static $supported_themes = array(
		'ssau-minimalist'
	);

	public function onAfterInit() {

		$config = Config::inst();
		$theme = $config->get('SSViewer', 'theme');
		$supported = $config->get('PageControllerThemeExtension', 'supported_themes');
		if (Config::inst()->get('PageControllerThemeExtension', 'include_requirements') && in_array($theme, $supported)) {
			// we'll use the frontend dashboard jquery
			Requirements::block(THIRDPARTY_DIR .'/jquery/jquery.js');
			
			// block frontend dashboards' js, we have our own
			Requirements::block('frontend-dashboards/javascript/dashboards.js');
			
			Requirements::javascript('frontend-dashboards/javascript/jquery-1.10.2.min.js');
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-cookie/jquery.cookie.js');
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery-ui.js');
			Requirements::javascript('frontend-dashboards/javascript/jquery-migrate-1.2.1.min.js');
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-entwine/dist/jquery.entwine-dist.js');
			
			Requirements::javascript("themes/{$theme}/js/modernizr.js");
			Requirements::javascript("themes/{$theme}/js/foundation.min.js");
			
			Requirements::javascript("themes/{$theme}/js/jquery.slides.min.js");
			Requirements::javascript("themes/{$theme}/js/general.js");
			Requirements::javascript('intranet-sis/javascript/info-lists.js');
			Requirements::javascript('intranet-sis/javascript/info-lists-foundation.js');

			if ($this->owner instanceof DashboardController) {
				Requirements::javascript("themes/{$theme}/js/dashboards.js");
			}
		}
	}
	
	/**
	 * Allows concrete controllers to provide implementations
	 */
	public function PreLayout() {
		
	}
	
	public function PostLayout() {
		
	}
}
