<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<?php
$user_role = User::find_role_by_id($_SESSION['user_id']);

switch ($user_role) {
    case "Super User":
        include($_SERVER["DOCUMENT_ROOT"] . '/admin/modules/dashboards/super_user_dashboard.php');
        break;
    case "User":
        include($_SERVER["DOCUMENT_ROOT"] . '/admin/modules/dashboards/user_dashboard.php');
        break;
}
?>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>