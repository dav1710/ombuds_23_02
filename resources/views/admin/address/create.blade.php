@extends('admin/layouts.admin_layout')

@section('title', 'Add Address')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել Հասցե</h1>
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
                   <form action="{{ route('address.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="card-body">
                           <div class="form-group">
                               <label for="region_am">Մարզ հայերեն</label>
                               <input type="text" name="region_am" class="form-control" id="region_am" placeholder="Մուտքագրել Մարզ հայերեն" required>
                           </div>
                           <div class="form-group">
                               <label for="region_en">Մարզ անգլերեն</label>
                               <input type="text" name="region_en" class="form-control" id="region_en" placeholder="Մուտքագրել Մարզ անգլերեն" required>
                           </div>
                           <div class="form-group">
                               <label for="work_time_am">Աշխատաժամեր հայերեն</label>
                               <input type="text" name="work_time_am" class="form-control" id="work_time_am" placeholder="Մուտքագրել Աշխատաժամեր հայերեն" required>
                           </div>
                           <div class="form-group">
                               <label for="work_time_en">Աշխատաժամեր անգլերեն</label>
                               <input type="text" name="work_time_en" class="form-control" id="work_time_en" placeholder="Մուտքագրել Աշխատաժամեր անգլերեն" required>
                           </div>
                           <div class="form-group">
								<label for="address_am">Հասցե հայերեն</label>
                            	<input type="text" name="address_am" class="form-control" id="address_am" placeholder="Մուտքագրել Հասցե հայերեն" required>
                            </div>
							<div class="form-group">
								<label for="address_en">Հասցե անգլերեն</label>
								<input type="text" name="address_en" class="form-control" id="address_en" placeholder="Մուտքագրել Հասցե անգլերեն" required>					
							</div>
							<div class="form-group">
								<label for="mail">Էլ֊հասցե</label>
								<input type="email" name="mail" class="form-control" id="mail" placeholder="Մուտքագրել Էլ֊հասցե" required>				
							</div>
							<div class="form-group">
								<label for="phone">Հեռախոսահամար</label>
								<input type="number" name="phone" class="form-control" id="phone" placeholder="Մուտքագրել Հեռախոսահամար" required>				
							</div>
							<div class="form-group">
								<label for="phone_messanger">Երկրորդ Հեռախոսահամար</label>
								<input type="number" name="phone_messanger" class="form-control" id="phone_messanger" placeholder="Մուտքագրել Երկրորդ Հեռախոսահամար">				
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
