{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
	<div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)" class="newClass">Payment Information Form</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Element</a></li> -->
			</ol>
	    </div>
		<div class="row">
			<div class="col-xl-12">
				<div class="table-responsive table-hover fs-14">
					<table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example6">
						<thead>
							<tr>
								<th style="min-width: 120px !important">Post Type</th>
								<th>Amount</th>
								<th>Payment Method</th>
								<th>Payment ID</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="user-info-tbody">
							<tr>
								<td>Public</td>
								<td>50$</td>
								<td>PayPal</td>
								<td>
									<span class="text-black font-w600">12345678</span>
								</td>
								<td>
									<div class="table-action-tr"><svg class="table-action-tr-first" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
									<svg class="table-action-tr-second" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
								    </div>
							    </td>
							</tr>
							<tr>
								<td>Private</td>
								<td>100$</td>
								<td>Visa</td>
								<td>
									<span class="text-black font-w600">12345678</span>
								</td>
								<td>
									<div class="table-action-tr"><svg class="table-action-tr-first" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" ><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
									<svg class="table-action-tr-second" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
								    </div>
							    </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="basic-form">
							<button type="button" class="btn btn-primary my-3">Add New</button>
	                    </div>

	    <div class="row">
			<div class="col-xl-6 col-lg-6 w-100">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Post Type</h4>
	                </div>
	                <div class="card-body py-0">
	                    <div class="basic-form">
	                        <form>
								<select class="default-select form-control wide">
									<option>Public Post</option>
									<option>Private Post</option>
								</select>
	                        </form>
	                    </div>
	                </div>
					<div class="card-header">
	                    <h4 class="card-title">Amount</h4>
	                </div>
	                <div class="card-body py-0">
	                    <div class="basic-form">
	                        <form>
								<input type="text" class="form-control wide" placeholder="eg. 50$">
	                        </form>
	                    </div>
	                </div>
					<div class="card-header">
	                    <h4 class="card-title">Payment Method</h4>
	                </div>
	                <div class="card-body py-0">
	                    <div class="basic-form">
	                        <form>
								<select class="default-select form-control wide ">
									<option>PayPal</option>
									<option>Wise</option>
									<option>Visa/Master Card</option>
								</select>
	                        </form>
	                    </div>
	                </div>
					<div class="card-header">
	                    <h4 class="card-title">Payment ID:</h4>
	                </div>
	                <div class="card-body py-0">
	                    <div class="basic-form">
	                        <form>
								<input type="text" class="form-control wide" placeholder="eg. 12345678">
	                        </form>
							<button type="button" class="btn btn-primary my-3">Save</button>
	                    </div>
	                </div>
	            </div>
			</div>
	    </div>
	</div>
@endsection
