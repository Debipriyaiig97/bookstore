@extends('admin.includes.layout')

@section('page_title','Book')

@section('container')
<div class="content-wrapper">
	<div class="card">
		<div class="card-header bg-white">
		  Book List
			<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addFormModal"
				data-whatever="@mdo"><i class="fa fa-plus"></i>Add Book</button>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">
						<table id="datatable-jquery" class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Author</th>
									<th>Description</th>
									<th>Image</th>
									<th>ISBN</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							 @foreach ($book as $key => $val)
							 <tr>
							 <td>{{ $loop->iteration }}</td>
							 <td>{{ $val->title }}</td>
							 <td>{{ $val->author }}</td>
							 <td>{{ $val->description }}</td>
							@if($val->image !="")
							<td><img src="{{url('/')}}/public//assets/admin/images/{{$val->image}}" /></td>
							@else
							<td><h4>No Image</h4></td>
							@endif
							<td>
							{{ $val->isbn }}
							<td>
                    		 <button class="btn btn-primary table-btn" data-toggle="modal" data-target="#editbook{{ $val->id}}"><i class="fa fa-edit" data-toggle="tooltip" title="Edit" data-placement="top"></i>Edit</button>
							<form class="delete-form d-inline-block" action="{{ route('admin.deleteBook') }}" method="post">
								@csrf
								<input type="hidden" name="id" value="{{ Crypt::encrypt($val->id) }}">
								<button type="submit" class="btn btn-danger table-btn btn-delete delete-confirm">
								<i class="fa fa-trash"></i>Delete
								</button>
							</form>
                            </td>
							{{-- Edit Modal Start --}}

							<div class="modal fade" id="editbook{{ $val->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content" style="width: 150% !important;">
										<form method="POST" action="{{ route('admin.updateBook') }}">
											@csrf
											<div class="modal-header header-background">
												<h5 class="modal-title text-white" id="ModalLabel">Edit Book</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true" class="text-white">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row">
												<input type="hidden" name="edit_id" class="form-control" value="{{$val->id}}">
													<div class="form-group col-md-6">
														<label for="category-name" class="col-form-label">Title<span class="text-danger">*</span></label>
														<input type="text" name="title" class="form-control" value="{{ $val->title }}" placeholder="Enter Title">
													</div>
													<div class="form-group col-md-6">
														<label for="category-name" class="col-form-label">Author<span class="text-danger">*</span></label>
														<input  type="text" class="form-control" name="author" value="{{ $val->author }}">
													</div>
													<div class="form-group col-md-6">
														<label for="category-name" class="col-form-label">Genre<span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="genre"  value="{{ $val->genre }}">
													</div>
													<div class="form-group col-md-6">
														<label for="category-name" class="col-form-label">Published Date<span class="text-danger">*</span></label>
														<input type="date" class="form-control" name="published" value="{{ $val->published }}">
													</div>
													<div class="form-group col-md-6">
														<label for="category-name" class="col-form-label">Publisher<span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="publisher" value="{{ $val->publisher }}">
													</div>
													<div class="form-group col-md-6">
														<label for="category-name" class="col-form-label">ISBN<span class="text-danger">*</span></label>
														<input type="number" class="form-control" name="isbn" value="{{ $val->isbn }}">
													</div>
													<div class="form-group col-md-6">
														<label for="category-icon" class="col-form-label">Image<span class="text-danger">*</span></label>
														<input type="file" name="image" class="dropify" required />
														<input type="hidden" name="old_image" class="form-control" value="{{$val->image}}">
													</div>
													<div class="form-group col-md-6">
														<label for="category-name" class="col-form-label">Description<span class="text-danger">*</span></label>
														<textarea class="form-control" name="description" placeholder="Enter Short Description" rows="10">{{ $val->description }}</textarea>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-success">Submit</button>
												<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<tr>
							 @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Add Modal Start --}}

<div class="modal fade" id="addFormModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="width: 150% !important;">
			<form id="ajaxForm" method="POST" action="{{ route('admin.createBook') }}">
				@csrf
				<div class="modal-header header-background">
					<h5 class="modal-title text-white" id="ModalLabel">Add Book</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-white">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="category-name" class="col-form-label">Title<span class="text-danger">*</span></label>
							<input type="text" name="title" class="form-control" placeholder="Enter Title">
							<p id="errtitle" class="mb-0 text-danger em"></p>
						</div>
						<div class="form-group col-md-6">
							<label for="category-name" class="col-form-label">Author<span class="text-danger">*</span></label>
							<input  type="text" class="form-control" name="author">
							<p id="errauthor" class="mb-0 text-danger em"></p>
						</div>
						<div class="form-group col-md-6">
							<label for="category-name" class="col-form-label">Genre<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="genre"  value="">
							<p id="errgenre" class="mb-0 text-danger em"></p>
						</div>
						<div class="form-group col-md-6">
							<label for="category-name" class="col-form-label">Published Date<span class="text-danger">*</span></label>
							<input type="date" class="form-control" name="published">
							<p id="errpublished" class="mb-0 text-danger em"></p>
						</div>
						<div class="form-group col-md-6">
							<label for="category-name" class="col-form-label">Publisher<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="publisher">
							<p id="errpublisher" class="mb-0 text-danger em"></p>
						</div>
						<div class="form-group col-md-6">
							<label for="category-name" class="col-form-label">ISBN<span class="text-danger">*</span></label>
							<input type="number" class="form-control" name="isbn">
							<p id="errisbn" class="mb-0 text-danger em"></p>
						</div>
						<div class="form-group col-md-6">
							<label for="category-icon" class="col-form-label">Image<span class="text-danger">*</span></label>
							<input type="file" name="image" class="dropify" required />
							<p id="errimage" class="mb-0 text-danger em"></p>
						</div>
						<div class="form-group col-md-6">
                            <label for="category-name" class="col-form-label">Description<span class="text-danger">*</span></label>
							<textarea class="form-control" name="description" placeholder="Enter Short Description" rows="10"></textarea>
                            <p class="mb-0 text-danger em" id="errdescription"></p>
                        </div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="submitBtn" type="button" class="btn btn-success">Submit</button>
					<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>

{{-- Add Modal End --}}

@endsection