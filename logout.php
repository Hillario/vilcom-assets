<?php
/**
 * vilcom networks web portal
 *
 * PHP version 8.2.12
 *
 * @category    Frontend + Backend
 * @package     vilcom-assets
 * @author      Hillary Chesaro
 * @license     Vilcom Networks
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