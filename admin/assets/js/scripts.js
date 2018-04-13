$(document).ready(function(){
    $('#dataTable').DataTable();

    $('#add_category_form').submit(function(e){
        e.preventDefault();

        var postData = $(this).serialize();
        var url = $(this).attr('action');

        $.ajax({
            url: url,
            data: postData,
            type: 'POST',
            success: function(data){
                if(!data.error){
                    $('#reload_category').load(' #reload_category');
                    $('#category').modal('hide');
                }
            }
        });

        // $('#addCarForm')[0].reset();
    });
});