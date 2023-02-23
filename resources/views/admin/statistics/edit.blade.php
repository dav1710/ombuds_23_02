@extends('admin/layouts.admin_layout')

@section('title', 'Edit statistics')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել Վիճակագրությունը: {{ $statistic['info_am'] }}</h1>
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
                        <form action="{{ route('statistics.update', $statistic['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                        <label for="info_am">Վերնագիր հայերեն</label>
                                        <input type="text" name="info_am" value="{{ $statistic['info_am'] }}" class="form-control" id="info_am" placeholder="Մուտքագրել Վերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                        <label for="info_en">Վերնագիր անգլերեն</label>
                                        <input type="text" name="info_en" value="{{ $statistic['info_en'] }}" class="form-control" id="info_en" placeholder="Մուտքագրել Վերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="link">Վիճակագրությունը</label>
                                    <input type="url" name="link" value="{{ $statistic['link'] }}" class="form-control" id="link" placeholder="Հղում" required>
                                </div>
                                <div class="form-group">
                                        <label for="preview_image">Նկար</label>
                                        <input type="file" name="preview_image" value="{{ $statistic['preview_image'] }}" class="form-control" id="preview_image">
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

