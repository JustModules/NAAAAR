<?php

/*
 * NAAAAR by Just Modules: A free open-source WHMCS module
 * (c) Mark Hughes 2017 <m@rkhugh.es>
 *
 * https://github.com/JustModules/NAAAAR
 */

class Module_NAAAAR {

	public static function config() {
		return [
			"name" => "NAAAAR",
			"description" => "Notify All Admins About Admin Replies",
			"version" => "1.0",
			"author" => "Just Modules"
		];
	}

}

// Push into class
function NAAAAR_config() { return Module_NAAAAR::config(); }
