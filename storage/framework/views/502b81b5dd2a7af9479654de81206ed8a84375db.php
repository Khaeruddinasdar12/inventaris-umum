<?php $__env->startSection('content'); ?>
		<!-- home -->
		<div class="text-center">
			<img src="<?php echo e(asset('gentella/images/logoKDCW.png')); ?>" alt="KeDai Computerworks" class="logos">
			<h3 class="text-header">Inventaris Barang Sekretariat</h3>
			<img src="<?php echo e(asset('gentella/images/header-logo2.png')); ?>" alt="KeDai" class="image-header">
		</div>
		<!-- akhir home -->

		<!-- barang -->
		<div class="row">
			<div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12 col-md-offset-2">
				<a href="<?php echo e(route('data-barang.index')); ?>">
					<div class="tile-stats padd">
						<div class="icon"><i class="fa fa-pie-chart"></i>
						</div>
						<div class="count ico"><?php echo e($databarang); ?></div>
						<h3 class="desc">Jumlah Barang Yang Ada Saat Ini</h3>
					</div>
				</a>
			</div>
			<div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12 ">
				<a href="<?php echo e(route('peminjaman.index')); ?>">
					<div class="tile-stats padd">
						<div class="icon"><i class="fa fa-shopping-cart"></i>
						</div>
						<div class="count ico"><?php echo e($barangpinjam); ?></div>
						<h3 class="desc">Jumlah Barang Yang Di Pinjam</h3>
					</div>
				</a>
			</div>
		</div>
		<!-- akhir barang -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>