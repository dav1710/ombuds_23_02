@extends('admin/layouts.admin_layout')

@section('title', 'Add Slide')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել Սլայդ</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
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
                        <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_am">Վերնագիր հայերեն</label>
                                    <textarea id="editor" name="title_am" class="form-control" id="title_am" placeholder="Մուտքագրել վերնագիր հայերեն"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Վերնագիր անգլերեն</label>
                                    <textarea id="editor2" name="title_en" class="form-control" id="title_en" placeholder="Մուտքագրել վերնագիր անգլերեն"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="img">Նկար</label>
                                    <input type="file" name="img" class="form-control" id="img" required>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">+ Ավելացնել</button>
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