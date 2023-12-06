{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
	<div class="container-fluid">
		<div class="form-head mb-sm-5 mb-3 d-flex align-items-center flex-wrap">
			<h2 class="font-w600 mb-0 me-auto mb-2 text-black">My Wallet 222</h2>
			<!-- <a href="javascript:void(0);" class="btn btn-outline-secondary me-3 mb-2"><i class="las la-calendar scale5 me-2"></i>Filter Periode</a>
			<a href="javascript:void(0);" class="btn btn-secondary mb-2">+ Add Wallet</a> -->
		</div>
		
	</div>
@endsection	

{{-- Scripts --}}
@section('scripts')
	<script>
		$(document).ready(function(){
			$(".theme-colors .btn").click(function(){
				$('.theme-colors .btn').removeClass("active");
				$(this).addClass("active");
		  	});
		}); 
	</script>
@endsection