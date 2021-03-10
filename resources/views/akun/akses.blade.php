<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title" style="margin-top:10px;margin-bottom:10px;">Pengaturan Hak Akses
            <a href="{{ route('makanan.create') }}" class="btn btn-success form_click ml-5" style="margin-top: -8px;" title="Tambah Makanan"><i class="icon-plus"></i> Tambah Makanan </a>
        </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Jabatan Akun</th>
                      <th>Jabatan Akun</th>
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
            $('.dataTables_filter input[type="search"]').attr('placeholder','Cari Jabatan Akun').css({'width':'150px'});
        })

        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('hak_akses.data') }}",
            columnDefs: [
                {targets : 0,data: 'id', name: 'id'},
                {targets : 1,data: 'name', name: 'name'},
                {targets : 2,data: 'action', name: 'action'},

                
            ]
        });
</script>