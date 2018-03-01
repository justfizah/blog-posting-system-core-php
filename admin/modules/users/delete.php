<?php ob_start(); ?>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/init.php'); ?>

<?php
if (!$session->is_signed_in()) {
    $flash->set_message('danger', 'Sorry! You are not logged in.');
    redirect('/admin/login.php');
} else {
    if (empty($_GET['id'])) {
        $flash->set_message('danger', 'This user not found in our database.');
        redirect('/admin/modules/users');
    }

    $user = User::find_user_by_id($_GET['id']);

    if ($user) {
        $user->delete();
        $flash->set_message('success', $user->first_name . '\'s has been removed from our database.');
        redirect('/admin/modules/users');
    } else {
        $flash->set_message('danger', 'This user not found in our database.');
        redirect('/admin/modules/users');
    }
}
?>