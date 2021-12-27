(function(){

    $(function(){

        $('#delete_modal').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var id = $(e.relatedTarget).data('id');

            //populate the textbox
            $(e.currentTarget).find('input[name="delete"]').val(id);

            return true;
        });
    });
})();
