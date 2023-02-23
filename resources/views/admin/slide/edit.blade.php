@extends('admin/layouts.admin_layout')

@section('title', 'Edit Slide')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել Սլայդ: {{ $slide['title_am'] }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">

                        <!-- form start -->
                        <form action="{{ route('slide.update', $slide['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                       <div class="card-body">
                           <div class="form-group">
								<label for="title_am">Վերնագիր հայերեն</label>
                            	<textarea id="editor" name="title_am" class="form-control" id="title_am" placeholder="Մուտքագրել Վերնագիր հայերեն">
                                    {{ $slide['title_am'] }}
                                </textarea>
                           </div>
                           <div class="form-group">
								<label for="title_en">Վերնագիր անգլերեն</label>
                            	<textarea id="editor2" name="title_en" class="form-control" id="title_en" placeholder="Մուտքագրել Վերնագիր անգլերեն">
                                    {{ $slide['title_en'] }}
                                </textarea>
                           </div>
                           <div class="form-group">
								<label for="img">Նկար</label>
								<input type="file" name="img" value="{{ $slide['img'] }}" class="form-control" id="img">	
                           </div>
                       </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Պահպանել</button>
                            </div>
                        </form>
						@if ($errors->any())
				        <div class="mt-3 alert alert-danger">
				            <ul>
				                @foreach ($errors->all() as $error)
				                    <li>{{ $error }}</li>
				                @endforeach
				            </ul>
				        </div>
				    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList' ],
            } )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor2' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection