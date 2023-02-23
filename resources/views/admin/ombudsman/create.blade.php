@extends('admin/layouts.admin_layout')

@section('title', 'Add Ombudsman')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել Պաշտպան</h1>
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
                   <form action="{{ route('ombudsman.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="card-body">
							<div class="form-group">
								<div class="form-check form-switch ml-4">
								  <input class="form-check-input" type="checkbox" name="defender" id="flexSwitchCheckDefault" checked>
								  <label class="form-check-label" for="flexSwitchCheckDefault">Գործող պաշտպան</label>
								</div>
							</div>
							<div class="form-group">
								<label for="img">Նկար</label>
								<input type="file" name="img" class="form-control" id="img">					
							</div>
                           <div class="form-group">
								<label for="name">Անուն Հայերեն</label>
                            	<input type="text" name="name_am" value="{{ old('name_am') }}" class="form-control" id="name_am" placeholder="Մուտքագրել Անուն Հայերեն" required>
                            </div>
                           <div class="form-group">
								<label for="name">Անուն Անգլերեն</label>
                            	<input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control" id="name_en" placeholder="Մուտքագրել Անուն Անգլերեն" required>
                            </div>
                           <div class="form-group">
								<label for="subject_am">Թեմա հայերեն</label>
                            	<input type="text" name="subject_am" value="{{ old('subject_am') }}" class="form-control" id="subject_am" placeholder="Մուտքագրել Թեմա հայերեն">
                            </div>
                           <div class="form-group">
								<label for="subject_en">Թեմա Անգլերեն</label>
                            	<input type="text" name="subject_en" value="{{ old('subject_en') }}" class="form-control" id="subject_en" placeholder="Մուտքագրել Թեմա Անգլերեն">
                            </div>
                           <div class="form-group">
								<label for="content_am">Բովանդակություն Հայերեն</label>
                            	<textarea name="content_am" class="form-control" id="editor" placeholder="Մուտքագրել Բովանդակություն Հայերեն">{{ old('content_am') }}</textarea>
                            </div>
							<div class="form-group">
								<label for="content_en">Բովանդակություն Անգլերեն</label>
                            	<textarea name="content_en" class="form-control" id="editor2" placeholder="Մուտքագրել Բովանդակություն Անգլերեն">{{ old('content_en') }}</textarea>
							</div>
							<div class="form-group">
								<label for="phone">Հեռախոսահամար</label>
								<input type="number" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" placeholder="Մուտքագրել Հեռախոսահամար">
							</div>				
							<div class="form-group">
								<label for="email">Էլ֊հասցե</label>
								<input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Մուտքագրել Էլ֊հասցե" >
							</div>				
							<div class="form-group">
								<label for="fb_link">Ֆեյսբուքի հղում</label>
								<input type="url" name="fb_link" value="{{ old('fb_link') }}" class="form-control" id="fb_link" placeholder="Մուտքագրել Ֆեյսբուքի հղում">
							</div>
							<div class="form-group">
								<label for="twitter_link">Թվիթերի հղում</label>
								<input type="url" name="twitter_link" value="{{ old('twitter_link') }}" class="form-control" id="twitter_link" placeholder="Մուտքագրել Թվիթերի հղում">
							</div>
                           <div class="form-group">
                            	<label for="audio_am">Հայերեն Աուդիո </label>
                            	<input type="file" name="audio_am" class="form-control" id="audio_am" placeholder="Choose File">
                            </div>
                           <div class="form-group">
                            	<label for="audio_en">Անգլերեն Աուդիո </label>
                            	<input type="file" name="audio_en" class="form-control" id="audio_en" placeholder="Choose File">
                            </div>
                           <div class="form-group">
                            	<label for="audio2_am">Հայերեն Աուդիո 2</label>
                            	<input type="file" name="audio2_am" class="form-control" id="audio2_am" placeholder="Choose File">
                            </div>
                           <div class="form-group">
                            	<label for="audio2_en">Անգլերեն Աուդիո 2</label>
                            	<input type="file" name="audio2_en" class="form-control" id="audio2_en" placeholder="Choose File">
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
