<?php

namespace App\Classes\Core;

use App\Traits\Notices;

class CheckDependencies {

	use Notices;

	public function __construct()
	{
		$this->verifyAcf();
	}

	/**
	 * Returns the existence of the ACF Pro. If not, the plugin will not be activated.
	 *
	 * @return bool
	 */
	public function verifyAcf(): bool
	{
		if (! class_exists('acf_pro')) {
			add_action('admin_notices', [$this, 'AcfFallbackNotice']);
			return $this->PluginDeactivate();
		}

		return true;
	}

	/**
	 * Disable the plugin
	 *
	 * @return false
	 */
	public function PluginDeactivate(): bool
	{
		deactivate_plugins(plugin_basename(TOTVS_SETUP_PLUGIN_INDEX));

		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		return false;
	}
}