<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title" style="margin-top:10px;margin-bottom:10px;">Daftar Makanan
            <a href="{{ route('makanan.create') }}" class="btn btn-success form_click ml-5" style="margin-top: -8px;" title="Tambah Makanan"><i class="icon-plus"></i> Tambah Makanan </a>
        </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Makanan</th>
                      <th>Harga</th>
                      <th>Tindakan</th>
                  </tr>
              </thead>
              <tbody>
                  
              </tbody>
          </table>
    </div>
</div>

<script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>

<script>
        $(document).ready(function () {
            // Atur kolom search pada datatables
            $('.dataTables_filter label').addClass('text-left');
            $('.dataTables_filter').addClass('text-right');
            $('.dataTables_filter input[type="search"]').attr('placeholder','Cari Menu Makanan / Minuman').css({'width':'250px'});

            const   link = $('.form_click'),
                    render = $('#render'),
                    edit = $('.action_button');

            link.on('click',function(t){
                t.preventDefault();
                let route = $(this).attr('href');
                
            
                $.get(route,function(data){
                    render.html(data);
                });
            });

        
        })

        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('makanan.data') }}",
            columnDefs: [
                {
                    "targets": 0,
                    "data": "id",
                    "orderable" : true,
                    "searchable": true,
                    "name": 'id'
                },
                {
                    "targets": 1,
                    "data": "nama",
                    "orderable" : true,
                    "searchable": true,
                    "name": 'nama'

                   
                },
                {
                    "targets": 2,
                    "data": "harga",
                    "orderable" : true,
                    "searchable": true,
                    "name": 'harga'

                   
                },
                {
                    "targets": 3,
                    "data": "action",
                    "orderable" : true,
                    "searchable": true,
                    "name": 'action'

                    
                }
            ]
        });
</script>