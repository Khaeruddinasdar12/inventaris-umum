<?php $__env->startSection('content'); ?>
<?php 
  $roles = Auth::user()->roles;
?>

    <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data Barang Yang Pernah Di Pinjam</h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Peminjam</th>
                    <th>Foto Setelah Peminjaman</th>
                    <th>Created_by</th>
                    <th>Accepted_by</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script type="text/javascript">
        function hapus_cek(role) {
  if(role != 'superadmin') {
    Swal.fire({
        type: 'error',
        title:  'Hanya SuperAdmin',
        showConfirmButton: true,
        timer: 5500,
        button: "Ok"
    })
   } else {
    $(document).on('click', '#del_pernah_pinjam', function(){
      // e.preventDefault();
      // $('#edit-user')[0].reset();
      Swal.fire({
        title: 'Anda Yakin ?',
        text: "Anda tidak dapat mengembalikan data yang telah di hapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Lanjutkan Hapus!',
        timer: 6500
      }).then((result) => {
          if (result.value) {
            var me = $(this),
                url = me.attr('href'),
                token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                  url: url,
                  method: "POST",
                  data : {
                    '_method' : 'DELETE',
                    '_token'  : token
                  },
                  success:function(data){
                    berhasil(data.status, data.pesan);

                    $('#table').DataTable().ajax.reload();
                  },
                  error: function(xhr, status, error){
                      var error = xhr.responseJSON; 
                      if ($.isEmptyObject(error) == false) {
                        $.each(error.errors, function(key, value) {
                          gagal(key, value);
                        });
                      }
                  } 
                });
        }
      });
    });
   }
}

     var tabel = null;
      var no = 1;
 tabel = $(document).ready(function(){
    $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ordering": true,
        "order": [[ 0, 'asc' ]],
        "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]],
        "ajax":  {
                "url":  '<?php echo e(route("tablepernahpinjam")); ?>', // URL file untuk proses select datanya
                "type": "GET"
              },
        "columns": [
            { "data": "kode_barang" },
            { "data": "nama" },
            { "data": "jumlah" },
            { "data": "created_at" },
            { "data": "tanggal_kembali" },
            { "data": "peminjam" },
            { "data": "foto_kembali" },
            { "data": "namaadmin" },
            { "data": "accepted_by" },
            { "data": "action" }
        ]
    });
});
      </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>