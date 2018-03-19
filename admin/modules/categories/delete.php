<?php ob_start(); ?>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/init.php'); ?>

<?php
if (!$session->is_signed_in()) {
    $flash->set_message('danger', 'Sorry! You are not logged in.');
    redirect('/admin/login.php');
} else {
    if (empty($_GET['id'])) {
        $flash->set_message('danger', 'This category not found in our database.');
        redirect('/admin/modules/categories');
    }

    $category = Category::find_category_by_id($_GET['id']);

    if ($category && $category->user_id === $_SESSION['user_id']) {
        $category->delete();
        $flash->set_message('success', $category->name . '\'s has been removed from our database.');
        redirect('/admin/modules/categories');
    } else {
        $flash->set_message('danger', 'This category not found in our database.');
        redirect('/admin/modules/categories');
    }
}
?>