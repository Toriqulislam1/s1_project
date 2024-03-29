@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Services </h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">

                        <form method="POST" action="{{ route('content-update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $services->id }}">
                            <input type="hidden" name="old_img" value="{{ $services->breadcrumb }}">


                            <div class="row">
                                <div class="col-12">



                                    <div class="row">
                                        <!-- start 2nd row  -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select Category</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                 <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Breadcrumb Header <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="content_slide_title" class="form-control" required="" value="{{ $services->content_slide_title }}">
                                                    @error('content_slide_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 6 -->


                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Breadcrumb Banner <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" required name="breadcrumb" class="form-control">
                                                    @error('breadcrumb')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="">
                                                </div>
                                            </div>


                                        </div> <!-- end col md 6 -->



                                    </div> <!-- end 2nd row  -->


                                    <div class="row">
                                        <!-- start 3rd row  -->



                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Service Title <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="content_title" class="form-control" required="" value="{{ $services->content_title}}">
                                                    @error('content_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 6 -->



                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Short Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="content_descrip" id="textarea" class="form-control" required placeholder="Textarea text">
			{!! $services->content_descrip !!}
			</textarea>
                                                </div>
                                            </div>

                                        </div> <!-- end col md 6 -->




                                    </div> <!-- end 3rd row  -->






                                    <div class="row">
                                        <!-- start 3rd row  -->


                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <h5>Long Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="long_descrip" rows="10" cols="80">
	{!! $services->long_descrip !!}
						</textarea>
                                                </div>
                                            </div>


                                        </div> <!-- end col md 12 -->

                                    </div> <!-- end 3rd row  -->

                                    <hr>

                                    <div class="row">

                                        <div class="text-lg-center">
                                            <input type="submit" class="btn btn-primary  " value="Update Service">
                                        </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->


    <!-- ///////////////// Start Thambnail Image Update Area ///////// -->

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Service Thumbnail Image <strong>Update</strong></h4>
                    </div>


                    <form method="post" action="{{ route('update-services-thamble') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $services->id }}">
                        <input type="hidden" name="old_img" value="{{ $services->thamble }}">

                        <div class="row row-sm">

                            <div class="col-md-3">

                                <div class="card">
                                    <img src="{{ asset($services->thamble) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                    <div class="card-body">

                                        <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input type="file" name="thamble" class="form-control" onChange="mainThamUrl(this)">
                                                <img src="" id="mainThmb">
                                            </div>
                                        </p>

                                    </div>
                                </div>

                            </div><!--  end col md 3		 -->


                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>
                        <br><br>



                    </form>





                </div>
            </div>



        </div> <!-- // end row  -->

    </section>
    <!-- ///////////////// End Start Thambnail Image Update Area ///////// -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/" + category_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function(data) {
                        $('select[name="childcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');
                        });
                    }
                , });
            } else {
                alert('danger');
            }
        });
        $('select[name="subcategory_id"]').on('change', function() {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/childcategory/ajax') }}/" + subcategory_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function(data) {
                        var d = $('select[name="childcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="childcategory_id"]').append('<option value="' + value.id + '">' + value.childcategory_name + '</option>');
                        });
                    }
                , });
            } else {
                alert('danger');
            }
        });

    });

</script>


<script type="text/javascript">
    function mainThamUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThmb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>



@endsection
