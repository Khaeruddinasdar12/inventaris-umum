@extends('layouts.template')

@section('content')
		<!-- home -->
		<div class="text-center">
			<img src="{{ asset('gentella/images/logoKDCW.png') }}" alt="KeDai Computerworks" class="logos">
			<h3 class="text-header">{{config('app.name')}}</h3>
		</div>
		<!-- akhir home -->

		<!-- barang -->
		<div class="row">
			<div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12 col-md-offset-2">
				<a href="{{route('data-barang.index')}}">
					<div class="tile-stats padd">
						<div class="icon"><i class="fa fa-pie-chart"></i>
						</div>
						<div class="count ico">{{$databarang}}</div>
						<h3 class="desc">Jumlah Barang Yang Ada Saat Ini</h3>
					</div>
				</a>
			</div>
			<div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12 ">
				<a href="{{route('peminjaman.index')}}">
					<div class="tile-stats padd">
						<div class="icon"><i class="fa fa-shopping-cart"></i>
						</div>
						<div class="count ico">{{$barangpinjam}}</div>
						<h3 class="desc">Jumlah Barang Yang Di Pinjam</h3>
					</div>
				</a>
			</div>
		</div>
		<!-- akhir barang -->
@endsection