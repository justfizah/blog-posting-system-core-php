<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<?php
$user_role = User::find_role_by_id($_SESSION['user_id']);

switch ($user_role) {
    case "Super User":
        include($_SERVER["DOCUMENT_ROOT"] . '/admin/modules/categories/super_user_index.php');
        break;
    case "User":
        include($_SERVER["DOCUMENT_ROOT"] . '/admin/modules/categories/user_index.php');
        break;
}
?>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>