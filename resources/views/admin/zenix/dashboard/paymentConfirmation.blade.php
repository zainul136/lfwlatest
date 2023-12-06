{{-- Extends layout --}}
@extends('admin.layout.default')



{{-- Content --}}
@section('content')
<div class="container-fluid">
	<div class="form-head d-flex align-items-center flex-wrap mb-sm-5 mb-3">
		<h2 class="font-w600 mb-0 text-black">Payment Confirmation</h2>
		<!-- <a href="javascript:void(0);" class="btn btn-outline-secondary ms-auto"><i class="las la-calendar scale5 me-2"></i>Filter Periode</a> -->
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="table-responsive table-hover fs-14">
				<table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example6">
					<thead>
						<tr>
							<th style="min-width: 150px !important;">Transaction ID</th>
							<th>Transaction Amount</th>
							<th>User (Paid)</th>
							<th>Status</th>
							<th>Date and Time</th>
							<th>Posts</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($subscriptions))
							@foreach($subscriptions as $subscription)
								<?php
									$post = \App\Models\Post::query()->where('id','=', $subscription->post_id)->first();
									?>

						<tr>
							<td>#{{$subscription->id ??''}}</td>
							<td>{{$subscription->subscription_cost ??''}}</td>
							<td>{{$subscription->subscriber->first_name. ' '.$subscription->subscriber->last_name ??''}}</td>
							<td>{{$subscription->status ??''}}</td>
							<td>{{ \Carbon\Carbon::parse($subscription->created_at)->format('M j, Y h:i A') }}</td>

							<td class="table-action-tr">
								<a href='{{route('deceased-post-details',$post->id ??'')}}'
									target="_blank" class="text-black font-w600"><svg class="table-action-tr-first"
										xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
										<path
											d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
									</svg></a>

							</td>
						</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
