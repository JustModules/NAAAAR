<?php

/*
 * NAAAAR by Just Modules: A free open-source WHMCS module
 * (c) Mark Hughes 2017 <m@rkhugh.es>
 *
 * https://github.com/JustModules/NAAAAR
 */

use WHMCS\User\Admin;


class Module_NAAAAR_Hooks {

	public static function onTicketAdminReply($vars) {
		$mergefields = [
			"messagename" => "Admin Ticket Reply",
			"ticket_id" => $vars["ticketid"],
			"ticket_department" => $vars["deptname"],
			"ticket_subject" => $vars["subject"],
			"ticket_priority" => $vars["priority"],
			"ticket_message" => nl2br($vars["message"]),
			"type" => "support",
			"deptid" => $vars["deptid"]
		];

		foreach (Admin::all() as $admin) {
			// Make sure the admin is in this department
			if (!in_array($vars["deptid"], $admin->supportDepartmentIds)) continue;

			// Use internal method to send the Admin Ticket Reply email to the admin
			sendAdminMessage("Admin Ticket Reply", $mergefields, null, $admin->id);
		}
	}

}

// Push into class
add_hook("TicketAdminReply", 1, Module_NAAAAR_Hooks::onTicketAdminReply);
