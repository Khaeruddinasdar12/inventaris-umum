 <?php
 $no = 1 ;
 ?>
 
 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr class="data-row">
  <td><?php echo e($no++); ?></td>>
  <td><?php echo e($datas->nama); ?></td>
  <td><?php echo e($datas->kondisi); ?></td>
  <td><?php echo e($datas->jumlah); ?></td>
  <td><?php echo e($datas->stok); ?></td>
  <td><?php echo e($datas->created_at); ?></td>
  <td>
    <img src="<?php echo e(asset('storage/' . $datas->foto)); ?>"
    width="120px"></td>
    <td><?php echo e($datas->created_by); ?></td>
    <td>
      <button data-toggle='modal' data-target='#confirm-edit' class="btn btn-success btn-xs"
      title="Edit Data" id="edit-item" data-item-id="1">
      <i class="fa fa-pencil"></i>
    </button>

    <button class="btn btn-danger btn-xs" title="Hapus Data">
      <i class="fa fa-trash"></i>
    </button>
  </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- 
  <?php
    echo json_encode($data);
  ?> -->

