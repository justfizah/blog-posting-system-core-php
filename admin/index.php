<?php
ob_start();
require_once($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/init.php');

if (!$session->is_signed_in()) {
    $flash->set_message('danger', 'Sorry! You are not logged in.');
    redirect('/admin/login.php');
    exit;
} else {
    $user_role = User::find_role_by_id($_SESSION['user_id']);

    switch ($user_role) {
        case "Super User":
            include($_SERVER["DOCUMENT_ROOT"] . '/admin/modules/dashboards/super_user_dashboard.php');
            break;
        case "User":
            include($_SERVER["DOCUMENT_ROOT"] . '/admin/modules/dashboards/user_dashboard.php');
            break;
    }
}
?>