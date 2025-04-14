<?php
/**
 * vilcom networks Vilcom IMS
 *
 * PHP version 8.2.12
 *
 * @category    Frontend + Backend
 * @package     vilcom-assets
 * @author      Hillary Chesaro
 * @license     Saro  Labs
 * @link        https://github.com/Hillario/vilcom-assets.git
 */

/**
 * logout.php
 *
 * This file logouts the user
 * 
 * @author Hillary Chesaro
 */

include "api/session_manager.php";
session_destroy();
echo('Redirecting...');
header('Location: signin.php');
exit();
?>