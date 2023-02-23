@extends('admin/layouts.admin_layout')

@section('title', 'Add Vacancy')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել Աշխատանք</h1>
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
                   <form action="{{ route('vacancy.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="card-body">
                           <div class="form-group">
                               <label for="work_title_am">Վերնագիր հայերեն</label>
                               <input type="text" name="work_title_am" class="form-control" id="work_title_am" placeholder="Մուտքագրել Վերնագիր հայերեն" minlength="3" maxlength="250" required>
                           </div>
						   <div class="form-group">
                               <label for="work_title_en">Վերնագիր անգլերեն</label>
                               <input type="text" name="work_title_en" class="form-control" id="work_title_en" placeholder="Մուտքագրել Վերնագիր անգլերեն" minlength="3" maxlength="250" required>
                           </div>
						   <div class="form-group">
                               <label for="work_subject_am">Փոքր կոնտենտ հայերեն</label>
                               <input type="text" name="work_subject_am" class="form-control" id="work_subject_am" placeholder="Մուտքագրել Վերնագիր անգլերեն" minlength="3" maxlength="250" required>
                           </div>
						   <div class="form-group">
                               <label for="work_subject_en">Փոքր կոնտենտ անգլերեն</label>
                               <input type="text" name="work_subject_en" class="form-control" id="work_subject_en" placeholder="Մուտքագրել Վերնագիր անգլերեն" minlength="3" maxlength="250" required>
                           </div>
						   <div class="form-group">
                               <label for="work_content_am">Կոնտենտ հայերեն</label>
                               <input type="text" name="work_content_am" class="form-control" id="work_content_am" placeholder="Մուտքագրել Վերնագիր անգլերեն" minlength="3" maxlength="250" required>
                           </div>
						   <div class="form-group">
                               <label for="work_content_en">Կոնտենտ անգլերեն</label>
                               <input type="text" name="work_content_en" class="form-control" id="work_content_en" placeholder="Մուտքագրել Վերնագիր անգլերեն" minlength="3" maxlength="250" required>
                           </div>
                           <div class="form-group">
								<label for="document_am">Փաստաթուղթ հայերեն</label>
                            	<input type="file" maxlength="10000" name="document_am" class="form-control" id="document_am">
                            </div>
							<div class="form-group">
								<label for="document_en">Փաստաթուղթ անգլերեն</label>
								<input type="file" maxlength="10000" name="document_en" class="form-control" id="document_en">
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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{ asset('admin_panel/dist/css/bootstrap-select.min.css') }}">

<!-- Latest compiled and minified JavaScript -->
<script src="{{ asset('admin_panel/dist/js/bootstrap-select.min.js') }}"></script>
@endsection
