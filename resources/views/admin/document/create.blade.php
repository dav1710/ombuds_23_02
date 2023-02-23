@extends('admin/layouts.admin_layout')

@section('title', 'Add Document')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել Փաստաթուղթ</h1>
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
                   <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="card-body">
                           <div class="form-group">
                                <label for="tabs">Ենթաէջեր</label>
                                <select id="tabs" class="selectpicker" name="tabs[]" multiple aria-label="Default select example" data-live-search="true" required>
                                @foreach ($tabs as $item)
                                    @if ($item->sort_tabs == 'files')
                                        <option value="{{ $item->id }}">{{ $item->name_am }}</option>
                                    @endif
                                @endforeach
                                </select>
                           </div>
                           <div class="form-group">
                               <label for="title_am">Վերնագիր հայերեն</label>
                               <input type="text" name="title_am" class="form-control" id="title_am" placeholder="Մուտքագրել Վերնագիր հայերեն" minlength="3" maxlength="250" required>
                           </div>
						   <div class="form-group">
                               <label for="title_en">Վերնագիր անգլերեն</label>
                               <input type="text" name="title_en" class="form-control" id="title_am" placeholder="Մուտքագրել Վերնագիր անգլերեն" minlength="3" maxlength="250" required>
                           </div>
                           <div class="form-group">
								<label for="document_am">Փաստաթուղթ հայերեն</label>
                            	<input type="file" maxlength="10000" name="document_am" class="form-control" id="document_am">
                            </div>
							<div class="form-group">
								<label for="document_en">Փաստաթուղթ անգլերեն</label>
								<input type="file" maxlength="10000" name="document_en" class="form-control" id="document_en">
							</div>
                            <div class="form-group">
                                <label>Ամսաթիվ:</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input name="created_at" value="{{ date('Y-m-d H:i:s') }}" max="{{ date('Y-m-d') }}" type="datetime-local" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd:mm:yyyy" data-mask="" inputmode="numeric">
                                </div>

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
