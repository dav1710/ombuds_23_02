@extends('admin/layouts.admin_layout')

@section('title', 'Add MediaFile')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել ձայնային կառավարում</h1>
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
                   <form action="{{ route('mediaFile.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="card-body">
                           <div class="form-group">
                                <label for="tabs">էջ</label>
                                <select id="tabs" class="selectpicker" name="tabs[]" aria-label="Default select example" data-live-search="true" required>
                                    @foreach ($tabs as $item)
                                        @if (str_contains($item->name, 'main' ) || !str_contains($item->name, '_'))
                                            <option value="{{ $item->id }}">{{ $item->name_am }}</option>    
                                        @endif
                                        @if ($item->name == 'courses_news')
                                            <option value="{{ $item->id }}">Կրթություն և Իրազեկում</option>    
                                        @endif                                    
                                        @if($item->name == 'reports_yearly_reports')
                                            <option value="{{ $item->id }}">Հաղորդումներ և զեկույցներ</option>
                                        @endif
                                        @if($item->name == 'media_news')
                                            <option value="{{ $item->id }}">Մեդիա կենտրոն</option>
                                        @endif
                                        @if($item->name == 'cooperation_program')
                                            <option value="{{ $item->id }}">Միջազգային համագործակցություն</option>
                                        @endif
                                        @if($item->name == 'about_advice')
                                            <option value="{{ $item->id }}">Մեր մասին</option>
                                        @endif
                                        @if($item->name == 'directions_applications')
                                            <option value="{{ $item->id }}">Դիմումներ և Բողոքներ</option>
                                        @endif
                                    @endforeach
                                </select>
                           </div>
                           <div class="form-group">
								<label for="mediaFile_am">Ֆայլ հայերեն</label>
                            	<input type="file" name="file_am" class="form-control" id="file_am" required>
                            </div>
							<div class="form-group">
								<label for="mediaFile_en">Ֆայլ անգլերեն</label>
								<input type="file" name="file_en" class="form-control" id="file_en">					
							</div>
                       </div>


                       <div class="card-footer">
                           <button type="submit" class="btn btn-primary">+ Ավելացնել </button>
                       </div>
                   </form>
                   
					@if ($errors->any())
                <div class="mt-3 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
						        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
						        <h4><i class="icon fa fa-check"></i>{{ $error }}</h4>
						    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection
