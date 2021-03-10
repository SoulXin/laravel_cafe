<a href="{{ $url_edit }}" class="modal-show edit" title="Edit {{ $model->nama }}" >
    <button class="btn btn-info">Edit</button>
</a>


<script>
    const render_body = $('#render_body');
    $("a").click(function(event) {
        event.preventDefault();
        var route = $(this).attr('href');

        $.get(route,function(data){
            render_body.html(data);
        });
    }); 
</script>