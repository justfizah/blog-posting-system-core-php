	<footer class="sticky-footer">
		<div class="container">
		  <div class="text-center">
		    <small>Copyright © Why So Awesome? <?= date("Y"); ?></small>
		  </div>
		</div>
	</footer>

	<!-- JavaScript -->
    <script src="/admin/assets/js/jquery.min.js"></script>
    <script src="/admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/assets/datatables/jquery.dataTables.js"></script>
    <script src="/admin/assets/datatables/dataTables.bootstrap4.js"></script>
    <script src="/admin/assets/js/prism.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=vfnkh382k2rxi896qv26paohbk3onzydgrxgoxjq6w3fra7g"></script>
    <script src="/admin/assets/js/sb-admin.min.js"></script>
    <script src="/admin/assets/js/scripts.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            menubar: false,
            plugins: "codesample",
            toolbar: "undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | codesample"
        });
    </script>
    
</body>

</html>