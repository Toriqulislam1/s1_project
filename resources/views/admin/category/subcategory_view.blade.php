@extends('admin.admin_master')
@section('admin')

 <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Data Tables</h3>
					<div class="d-inline-block align-items-center">
						<nav>

						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">
				<div class="box">
					<div class="box-header">
						<h4 class="box-title">Sub Model Table</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>

								<th>Model</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($subcategory as $item)
	 <tr>

		<td>{{ $item->subcategory_name }}</td>
		<td width="30%">
 <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

 <a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>

	 </tr>
	  @endforeach
						</tbody>

					  </table>
						</div>
					</div>
				</div>
			</div> <!-- end col-->

            <!--   ------------ Add Category Page -------- -->


<div class="col-4">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Model </h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


<form method="post" action="{{ route('subcategory.store') }}" >
@csrf

<div class="form-group">
	<h5>Brand Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control"  >
			<option value="" selected="" disabled="">Select Brand</option>
			@foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->category_name }}</option>
			@endforeach
		</select>
		@error('category_id')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 </div>
		 </div>


            <div class="form-group">
            <h5>Input Model Name  <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text"  name="subcategory_name" class="form-control" >
            @error('subcategory_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            </div>
            <div class="form-group">
            <h5>Model Name BN <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text"  name="subcategory_name_bn" class="form-control" >
            @error('subcategory_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            </div>


            <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                    </div>
</form>





       </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->
</div>


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>

  <!-- /.content-wrapper -->


@endsection
