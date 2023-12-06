{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
<style>
.container-fluid {
	/* background-color: yellow */
}
</style>
	<div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Lab Management</a></li>
			</ol>
	    </div>
	    <!-- row -->
	    <div class="row">
		<div class="col-xl-6 col-lg-6">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Lab Id</h4>
	                </div>
	                <div class="card-body">
	                    <div class="basic-form">
	                        <form>
	                            <!-- <div class="mb-3">
	                                <input class="form-control form-control-lg" type="text" placeholder="form-control-lg">
	                            </div> -->
	                            <div class="mb-3">
	                                <input class="form-control" type="number" placeholder="Enter Lab Id">
	                            </div>
	                            <!-- <div class="mb-3">
	                                <input class="form-control form-control-sm" type="text" placeholder="form-control-sm">
	                            </div> -->
	                        </form>
	                    </div>
	                </div>
	            </div>
			</div>

			<div class="col-xl-6 col-lg-6">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Lab Name</h4>
	                </div>
	                <div class="card-body">
	                    <div class="basic-form">
	                        <form>
	                            <!-- <div class="mb-3">
	                                <input class="form-control form-control-lg" type="text" placeholder="form-control-lg">
	                            </div> -->
	                            <div class="mb-3">
	                                <input class="form-control" type="text" placeholder="Enter Lab Name">
	                            </div>
	                            <!-- <div class="mb-3">
	                                <input class="form-control form-control-sm" type="text" placeholder="form-control-sm">
	                            </div> -->
	                        </form>
	                    </div>
	                </div>
	            </div>
			</div>
			<div class="col-xl-6 col-lg-6">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Lab Phone</h4>
	                </div>
	                <div class="card-body">
	                    <div class="basic-form">
	                        <form>
	                            <div class="mb-3">
	                                <input class="form-control" type="number" placeholder="Enter Lab Phone Number">
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
			</div>
			<div class="col-xl-6 col-lg-6">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Lab Email</h4>
	                </div>
	                <div class="card-body">
	                    <div class="basic-form">
	                        <form>
	                            <div class="mb-3">
	                                <input class="form-control" type="email" placeholder="Enter Lab Email Address">
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
			</div>
			<div class="col-xl-6 col-lg-6">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Lab PayPal ID (to get paid)</h4>
	                </div>
	                <div class="card-body">
	                    <div class="basic-form">
	                        <form>
	                            <div class="mb-3">
	                                <input class="form-control" type="text" placeholder="Enter PayPal ID">
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
			</div>
		
			<div class="col-xl-6 col-lg-6">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Lab State</h4>
	                </div>
	                <div class="card-body">
	                    <div class="basic-form">
	                        <form>
	                            <div class="mb-3">
	                                <select class="default-select  form-control wide" >
	                                    <option>State 1</option>
	                                    <option>State 2</option>
	                                    <option>State 3</option>
	                                    <option>State 4</option>
	                                </select>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
			</div>
			<div class="col-xl-6 col-lg-6">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Test types offered</h4>
	                </div>
	                <div class="card-body">
	                    <div class="basic-form">
							<form>
								<div class="mb-3">
									<input class="form-control" type="text" placeholder="E.g: test names, avg turnaround time, their cost, parameters, notes. ">
	                            </div>
								<button type="button" class="btn btn-primary">Submit</button>
	                        </form>
	                    </div>
	                </div>
	            </div>
			</div>
			
	    </div>
	</div>
@endsection