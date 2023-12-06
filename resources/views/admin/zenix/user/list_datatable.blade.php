{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')
	<div class="container-fluid">
		<div class="card">
			<div class="card-header d-sm-flex d-block">
				<div class="me-auto mb-sm-0 mb-3">
					<h4 class="card-title mb-2">Lab Managment</h4>
					<span>Lorem Ipsum sit amet</span>
				</div>
				<a href="javascript:void(0);" class="btn btn-info light me-3"><i class="las la-download scale3 me-2"></i>Import Csv</a>
				<a href="javascript:void(0);" class="btn btn-info">+ Add Customer</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table style-1" id="ListDatatableView">
						<thead>
							<tr>
								<th>#</th>
								<th>CUSTOMER</th>
								<th>COUNTRY</th>
								<th>DATE</th>
								<th>LAB NAME</th>
								<th>STATUS</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<h6>1.</h6>
								</td>
								<td>
									<div class="media style-1">
										<img src="{{ asset('images/avatar/1.jpg') }}" class="img-fluid me-2" alt="">
										<div class="media-body">
											<h6>John Doe</h6>
											<span>johndoe@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>England</h6>
										<span>COde:En</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">10/21/2016</h6>
										<span>Paid</span>
									</div>
								</td>
								<td>
									Abbott-Jacobs
								</td>
								<td><span class="badge badge-warning">Pending</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>2.</h6>
								</td>
								<td>
									<div class="media style-1">
										<span class="icon-name me-2 bgl-success text-success">m</span>
										<div class="media-body">
											<h6>Martin Chuaks</h6>
											<span>martinchuaks@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>Indonasia</h6>
										<span>COde:In</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">05/11/2016</h6>
										<span>Pending</span>
									</div>
								</td>
								<td>
									Loyto-Farik
								</td>
								<td><span class="badge badge-danger">Danger</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>3.</h6>
								</td>
								<td>
									<div class="media style-1">
										<img src="{{ asset('images/avatar/2.jpg') }}" class="img-fluid me-2" alt="">
										<div class="media-body">
											<h6>Oliver Jean</h6>
											<span>oliverjean@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>Malesia</h6>
										<span>COde:Ml</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">08/15/2016</h6>
										<span>Paid</span>
									</div>
								</td>
								<td>
									Uno-Matrics
								</td>
								<td><span class="badge badge-info">Info</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>4.</h6>
								</td>
								<td>
									<div class="media style-1">
										<img src="{{ asset('images/avatar/3.jpg') }}" class="img-fluid me-2" alt="">
										<div class="media-body">
											<h6>John Doe</h6>
											<span>johndoe@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>England</h6>
										<span>COde:En</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">11/05/2016</h6>
										<span>Paid</span>
									</div>
								</td>
								<td>
									Walter-Cummings
								</td>
								<td><span class="badge badge-success">Success</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>5.</h6>
								</td>
								<td>
									<div class="media style-1">
										<span class="icon-name me-2 bgl-info text-info">p</span>
										<div class="media-body">
											<h6>Post Melone</h6>
											<span>postmelone@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>China</h6>
										<span>COde:Ch</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">10/21/2016</h6>
										<span>Approved</span>
									</div>
								</td>
								<td>
									Abbott-Jacobs
								</td>
								<td><span class="badge badge-danger">Danger</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>6.</h6>
								</td>
								<td>
									<div class="media style-1">
										<img src="{{ asset('images/avatar/5.jpg') }}" class="img-fluid me-2" alt="">
										<div class="media-body">
											<h6>Kevin Mandala</h6>
											<span>kevinmandala@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>Africa</h6>
										<span>COde:Af</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">10/21/2016</h6>
										<span>Pending</span>
									</div>
								</td>
								<td>
									Abbott-Jacobs
								</td>
								<td><span class="badge badge-danger">Canceled</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>7.</h6>
								</td>
								<td>
									<div class="media style-1">
										<span class="icon-name me-2 bgl-danger text-danger">m</span>
										<div class="media-body">
											<h6>Mc. Kowalski</h6>
											<span>johndoe@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>England</h6>
										<span>COde:En</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">10/21/2016</h6>
										<span>Paid</span>
									</div>
								</td>
								<td>
									Abbott-Jacobs
								</td>
								<td><span class="badge badge-warning">Pending</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>8.</h6>
								</td>
								<td>
									<div class="media style-1">
										<img src="{{ asset('images/avatar/7.jpg') }}" class="img-fluid me-2" alt="">
										<div class="media-body">
											<h6>John Doe</h6>
											<span>johndoe@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>England</h6>
										<span>COde:En</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">10/21/2016</h6>
										<span>Paid</span>
									</div>
								</td>
								<td>
									Dare-Conn
								</td>
								<td><span class="badge badge-warning">Pending</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>9.</h6>
								</td>
								<td>
									<div class="media style-1">
										<span class="icon-name me-2 bgl-warning text-warning">t</span>
										<div class="media-body">
											<h6>Thomas Djons</h6>
											<span>thomasdjons@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>England</h6>
										<span>COde:En</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">10/21/2016</h6>
										<span>Paid</span>
									</div>
								</td>
								<td>
									Abbott-Jacobs
								</td>
								<td><span class="badge badge-info">Info</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>10.</h6>
								</td>
								<td>
									<div class="media style-1">
										<img src="{{ asset('images/avatar/8.jpg') }}" class="img-fluid me-2" alt="">
										<div class="media-body">
											<h6>Chintya Laudia</h6>
											<span>chintyalaudia@gmail.com</span>
										</div>
									</div>
								</td>
								<td>
									<div>
										<h6>England</h6>
										<span>COde:En</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">10/21/2016</h6>
										<span>Paid</span>
									</div>
								</td>
								<td>
									Abbott-Jacobs
								</td>
								<td><span class="badge badge-danger">Danger</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>
									<div class="d-flex align-items-center" style="gap: 8px;">
										<img src="https://odbackend.sn66.me/public/images/Ellipse 6.png" alt="">
											<p class="mb-0 font-w500">{{ $user->first_name . ' ' . $user->last_name  ??''}}</p>
											<p class="mb-0" style="font-size: 14px;">{{$user->email ??''}}</p>
										</div>

								</td>
								<td>Male</td>
								<td>02/17/2009</td>
								<td>034-7564-8765</td>
								<td>London</td>
								<td>England</td>
								<td>
									<div class="active-decease-status status-active">Active</div>
								</td>
								<td>
									<div class="table-action-tr">
										<a href="#" class="user-info-edit-btn">
											<svg class="table-action-tr-first" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M9.25 2.5L11.5 4.75M7.75 13H13.75M1.75 10L1 13L4 12.25L12.6895 3.5605C12.9707 3.27921 13.1287 2.89775 13.1287 2.5C13.1287 2.10226 12.9707 1.72079 12.6895 1.4395L12.5605 1.3105C12.2792 1.0293 11.8977 0.871323 11.5 0.871323C11.1023 0.871323 10.7208 1.0293 10.4395 1.3105L1.75 10Z" stroke="#99DDCC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="#">
											<svg class="table-action-tr-second remove remove-user-info" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M8.47559 3.37508H10.7256C10.7256 3.07671 10.6071 2.79056 10.3961 2.57958C10.1851 2.3686 9.89896 2.25008 9.60059 2.25008C9.30222 2.25008 9.01607 2.3686 8.80509 2.57958C8.59411 2.79056 8.47559 3.07671 8.47559 3.37508ZM7.35059 3.37508C7.35059 2.77834 7.58764 2.20604 8.0096 1.78409C8.43155 1.36213 9.00385 1.12508 9.60059 1.12508C10.1973 1.12508 10.7696 1.36213 11.1916 1.78409C11.6135 2.20604 11.8506 2.77834 11.8506 3.37508H16.3506C16.4998 3.37508 16.6428 3.43434 16.7483 3.53983C16.8538 3.64532 16.9131 3.78839 16.9131 3.93758C16.9131 4.08676 16.8538 4.22983 16.7483 4.33532C16.6428 4.44081 16.4998 4.50008 16.3506 4.50008H15.7161L14.3605 14.4428C14.2685 15.1166 13.9356 15.7343 13.4232 16.1815C12.9109 16.6287 12.2539 16.8751 11.5738 16.8751H7.62734C6.94729 16.8751 6.29028 16.6287 5.77795 16.1815C5.26561 15.7343 4.93265 15.1166 4.84071 14.4428L3.48509 4.50008H2.85059C2.7014 4.50008 2.55833 4.44081 2.45284 4.33532C2.34735 4.22983 2.28809 4.08676 2.28809 3.93758C2.28809 3.78839 2.34735 3.64532 2.45284 3.53983C2.55833 3.43434 2.7014 3.37508 2.85059 3.37508H7.35059ZM8.47559 7.31258C8.47559 7.16339 8.41632 7.02032 8.31083 6.91483C8.20534 6.80934 8.06227 6.75008 7.91309 6.75008C7.7639 6.75008 7.62083 6.80934 7.51534 6.91483C7.40985 7.02032 7.35059 7.16339 7.35059 7.31258V12.9376C7.35059 13.0868 7.40985 13.2298 7.51534 13.3353C7.62083 13.4408 7.7639 13.5001 7.91309 13.5001C8.06227 13.5001 8.20534 13.4408 8.31083 13.3353C8.41632 13.2298 8.47559 13.0868 8.47559 12.9376V7.31258ZM11.2881 6.75008C11.4373 6.75008 11.5803 6.80934 11.6858 6.91483C11.7913 7.02032 11.8506 7.16339 11.8506 7.31258V12.9376C11.8506 13.0868 11.7913 13.2298 11.6858 13.3353C11.5803 13.4408 11.4373 13.5001 11.2881 13.5001C11.1389 13.5001 10.9958 13.4408 10.8903 13.3353C10.7848 13.2298 10.7256 13.0868 10.7256 12.9376V7.31258C10.7256 7.16339 10.7848 7.02032 10.8903 6.91483C10.9958 6.80934 11.1389 6.75008 11.2881 6.75008ZM5.95559 14.291C6.0108 14.6952 6.21056 15.0657 6.51791 15.3339C6.82526 15.6022 7.21938 15.75 7.62734 15.7501H11.5738C11.982 15.7503 12.3764 15.6026 12.684 15.3343C12.9915 15.066 13.1915 14.6953 13.2467 14.291L14.581 4.50008H4.62021L5.95559 14.291Z" fill="#DE2F08"></path>
											</svg>
										</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<h6>1.</h6>
								</td>
								<td>
									<div class="media style-1">
										<img src="{{ asset('images/avatar/1.jpg') }}" class="img-fluid me-2" alt="">
										<div class="media-body">
											<h6>{{ $user->first_name . ' ' . $user->last_name  ??''}}</h6>
											<span>{{$user->email ??''}}</span>
										</div>
									</div>
								</td>
								<td>
									<div>
											<?php
											$country = \App\Models\Country::query()->where('code',$user->userInformation->country)->first();
											?>
										<h6>{{$country->name ??''}}</h6>

										<span>COde:{{$user->userInformation->country ??''}}</span>
									</div>
								</td>
								<td>
									<div>
										<h6 class="text-primary">{{$user->userInformation->date_of_birth ??''}}</h6>
										<span>Paid</span>
									</div>
								</td>
								<td>
									Abbott-Jacobs
								</td>
								<td><span class="badge badge-warning">Pending</span></td>
								<td>
									<div class="d-flex action-button">
										<a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>

										</a>
									</div>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection