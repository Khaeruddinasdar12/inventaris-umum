<?php $__env->startSection('content'); ?>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Peminjaman Barang</h2>

      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="text-center">
        <button data-toggle='modal' data-target='#confirm-add' class="btn btn-primary tombol">
          <i class="fa fa-plus"></i> Tambah data</button>
        </div>
        <table id="table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Peminjam</th>
              <th>Tanggal Pinjam</th>
              <th>Jumlah</th>
              <th>Kondisi</th>
              <th>Foto Barang Saat Dipinjam</th>
              <th>Created_by</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah peminjaman -->
  <div class="modal fade" id="confirm-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Barang</h4>
      </div>
      <form id="input_peminjaman" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="form-group" style="width: 100%;">
            <label for="kondisi" class="control-label">Pilih Barang Yang Akan Di Pinjamkan</label>
            <select name="kode_barang" class="form-control" id="kdbarang" onchange="stok()" required>
              <option value="" disabled selected>-- daftar barang --</option>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($datas->id); ?>"><?php echo e($datas->nama); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group" style="width: 100%;">
            <label for="nama" class="control-label">Stok :</label>
            <input type="text" id="jmlstok" class="form-control" disabled 
            style="width: 100%;" required>
          </div>
          <div class="form-group" style="width: 100%;">
            <label for="nama" class="control-label">Nama Peminjam :</label>
            <input type="text" name="peminjam" class="form-control" placeholder="Masukkan Nama Peminjam"
            style="width: 100%;" required>
          </div>
          <div class="form-group" style="width: 100%;">
            <label for="jumlah" class="control-label">Jumlah Barang Yang Dipinjam :</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Barang" maxlength="13"
            style="width: 100%;" required>
          </div>
          <span>
          <img width="90px" id="preview-add">
        </span>
        <div class="form-group" style="width: 100%;">
          <label for="foto" class="control-label">Masukkan Foto Barang (Sebelum peminjaman) :</label>
          <input type="file" name="foto" onchange="tampilkanPreview(this,'preview-add')" accept="image/*">
          <small>Maksimal 2MB</small>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Tambah Peminjaman -->

<!-- Modal Kembalikan Barang -->
<div class="modal fade" id="confirm-balik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Kembalikan Barang</h4>
    </div>
    <form id="kembalikan_barang" method="POST" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="modal-body">
        <div class="form-group" style="width: 100%;">
          <label for="nama" class="control-label">Nama Peminjam :</label>
          <input type="text" name="nama" id="balik-peminjam" class="form-control" style="width: 100%;"
          readonly="readonly" required>
        </div>
        <div class="form-group" style="width: 100%;">
          <label for="nama" class="control-label">Nama Barang :</label>
          <input type="text" name="nama" id="balik-nama" class="form-control" style="width: 100%;"
          readonly="readonly" required>
        </div>
        <div class="form-group" style="width: 100%;">
          <label for="kondisi" class="control-label">Kondisi Barang Saat Dikembalikan</label>
          <select name="kondisi" id="balik-kondisi" class="form-control" required>
            <option value="" disabled selected>-- kondisi barang --</option>
            <option value="Layak Pakai"> Layak Pakai </option>
            <option value="Tidak Layak Pakai"> Tidak Layal Pakai </option>
          </select>
        </div>
        <span>
          <img width="90px" id="preview">
        </span>
        <div class="form-group" style="width: 100%;">
          <label for="foto" class="control-label">Masukkan Foto Barang (Setelah peminjaman) :</label>
          <input type="file" name="foto" id="foto" onchange="tampilkanPreview(this,'preview')" accept="image/*">
          <small>Maksimal 2MB</small>
        </div>
      </div>
      <input type="hidden" name="hiddenid" id="hidden-id">
      <input name="_method" type="hidden" value="PUT">
      <!-- <input name="_method" type="hidden" value="PUT"> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Kembalikan</button>
      </div>
    </form>
  </div>
</div>
</div>
<!-- End Modal Kembalikan Barang -->

</div>


<script src="//code.jquery.com/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script type="text/javascript">
  function stok() {
    // var tes = document.getElementById("kdbarang").value;
    var id = $('#kdbarang').val();
    console.log(id);
    $.ajax({
      'url': "cekstok/"+id,
      'dataType': 'json',
      success:function(data){
        console.log(data);
        $('#jmlstok').val(data.stok);
      }

    })
  }

  $('#input_peminjaman').submit(function(e){
    e.preventDefault();
    var request = new FormData(this);
    // var endpoint= '<?php echo e(route("data-barang.store")); ?>';
    var endpoint= '<?php echo e(route("peminjaman.store")); ?>';
    $.ajax({
      url: endpoint,
      method: "POST",
      data: request,
      contentType: false,
      cache: false,
      processData: false,
            // dataType: "json",
            success:function(data){
              if(data.status == 'success') {
                $('#input_peminjaman')[0].reset();
                $('#confirm-add').modal('hide');
                $('#table').DataTable().ajax.reload();
              }

              $('#preview-add').attr('src', '');
              berhasil(data.status, data.pesan);
              
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
  });

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
                "url":  '<?php echo e(route("tablepeminjaman")); ?>', // URL file untuk proses select datanya
                "type": "GET"
              },
              "columns": [
              { "data": "kode_barang" },
              { "data": "nama" },
              { "data": "peminjam" },
              { "data": "created_at" },
              { "data": "jumlah" },
              { "data": "kondisi" },
              { "data": "foto_awal" },
              { "data": "namaadmin" },
              { "data": "action" }
              ]
            });
  });

  $('#kembalikan_barang').submit(function(e){
    e.preventDefault();
    var id  = eval(document.getElementById('hidden-id').value);

    // console.log(id);
    var request = new FormData(this);
    var endpoint= "peminjaman/"+id;
    $.ajax({
      url: endpoint,
      method: "POST",
      data: request,
      contentType: false,
      cache: false,
      processData: false,
            // dataType: "json",
            success:function(data){
              $('#kembalikan_barang')[0].reset();
              $('#confirm-balik').modal('hide');
              $('#preview').attr('src', '');
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
  });

  $(document).on('click', '#balik-item', function(){ // show item
    var id = $(this).attr('data-id');
    $.ajax({
      'url': "peminjaman/"+id+"/edit",
      'dataType': 'json',
      success:function(html){
        console.log(html.data);
        $('#hidden-id').val(html.data.id);
        $('#balik-peminjam').val(html.data.peminjam);
        $('#balik-nama').val(html.data.nama);
        $('#balik-kondisi').val(html.data.kondisi);
        $('#confirm-balik').modal('show');
      }

    })
  });

  $(document).on('click', '#del_id', function(e){
    e.preventDefault();
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
                // var token = $('meta[name="csrf-token"]').attr('content');
                // var id = eval(document.getElementById('delete_id').value);
                // var endpoint= 'data-barang/'+id;
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

  function tampilkanPreview(gambar, idpreview) {
    //membuat objek gambar
    var gb = gambar.files;
    //loop untuk merender gambar
    for (var i = 0; i < gb.length; i++) {
      //bikin variabel
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview = document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) {
        //jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(preview);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      } else {
        //jika tipe data tidak sesuai
        alert("Type file tidak sesuai. Khusus image.");
      }
    }
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>