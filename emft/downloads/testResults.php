<?php

/**
 * Bug 477734 - [SECURITY] Xss + SQL INJECTION
 *
 * SQL injection is a code injection technique,
 * used to attack data-driven applications, in which malicious
 * SQL statements are inserted into an entry field for execution
 * (e.g. to dump the database contents to the attacker).
 *
 * Cross-Site Scripting (XSS) vulnerabilities are a type of
 * computer security vulnerability typically found in Web applications.
 * XSS vulnerabilities enable attackers to inject client-side script
 * into Web pages viewed by other users.
 *
 * Given the severity of this bug, we added an exit() at the top
 * of this file to stop it from being executed on our servers.
 *
 * The owner(s) of this website should review every request to MYSQL before
 * removing the exit() on this page.
 *
 */
exit();

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/testResults-common.php"); ?>
