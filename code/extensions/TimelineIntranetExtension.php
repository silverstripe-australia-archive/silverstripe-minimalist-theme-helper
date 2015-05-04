<?php

class TimelineIntranetExtension extends Extension {

	public function onAfterInit() {

		$config = Config::inst();
		$theme = $config->get('SSViewer', 'theme');
		$supported = $config->get('PageControllerThemeExtension', 'supported_themes');
		if(in_array($theme, $supported)) {
			Requirements::javascript("themes/{$theme}/js/modernizr.js");
			Requirements::javascript("themes/{$theme}/js/foundation.min.js");
		}
	}

}