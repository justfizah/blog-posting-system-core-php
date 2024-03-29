<?php ob_start(); ?>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/init.php'); ?>

<?php
if (!$session->is_signed_in()) {
    $flash->set_message('danger', 'Sorry! You are not logged in.');
    redirect('/admin/login.php');
} else {
    if (isset($_POST['ajax_category'])) {
        $category = new Category;
        if ($category) {
            $category->user_id = $_SESSION['user_id'];
            $category->name = $_POST['ajax_category'];
            $category->create();
            exit;
        }
    }

    if (isset($_POST['create'])) {
        $category = new Category;
        if ($category) {
            $category->user_id = $_SESSION['user_id'];
            $category->name = $_POST['category'];
            $category->create();
            $flash->set_message('success', $category->name . ' has been added in our database.');
            redirect('/admin/modules/categories');
        }
    } else {
        $flash->set_message('danger', 'Please! Try again.');
        redirect('/admin/modules/categories');
    }
}
?>