@extends('admin/layouts.admin_layout')

@section('title', 'Edit Address')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել Հասցե: {{ $address['region_am'] }}</h1>
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
                        <form action="{{ route('address.update', $address['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                       <div class="card-body">							
                           <div class="form-group">
                               <label for="region_am">Մարզ հայերեն</label>
                               <input type="text" name="region_am" value="{{ $address['region_am'] }}" class="form-control" id="region_am" required>
                           </div>
                           <div class="form-group">
                               <label for="region_en">Մարզ անգլերեն</label>
                               <input type="text" name="region_en" value="{{ $address['region_en'] }}" class="form-control" id="region_en" required>
                           </div>
                           <div class="form-group">
                               <label for="work_time_am">Աշխատաժամեր հայերեն</label>
                               <input type="text" name="work_time_am" value="{{ $address['work_time_am'] }}" class="form-control" id="work_time_am" required>
                           </div>
                           <div class="form-group">
                               <label for="work_time_en">Աշխատաժամեր անգլերեն</label>
                               <input type="text" name="work_time_en" value="{{ $address['work_time_en'] }}" class="form-control" id="work_time_en" required>
                           </div>
                           <div class="form-group">
								<label for="address_am">Հասցե հայերեն</label>
                            	<input type="text" name="address_am" value="{{ $address['address_am'] }}" class="form-control" id="address_am" >
                           </div>
                           <div class="form-group">
								<label for="address_en">Հասցե անգլերեն</label>
								<input type="text" name="address_en" value="{{ $address['address_en'] }}" class="form-control" id="address_en" required>	
                           </div>
                           <div class="form-group">
								<label for="mail">Էլ֊հասցե</label>
								<input type="email" name="mail" value="{{ $address['mail'] }}" class="form-control" id="mail" required>	
                           </div>
                           <div class="form-group">
								<label for="phone">Հեռախոսահամար</label>
								<input type="number" name="phone" value="{{ $address['phone'] }}" class="form-control" id="phone" required>
                           </div>
                           <div class="form-group">
								<label for="phone_messanger">Երկրորդ Հեռախոսահամար</label>
								<input type="number" name="phone_messanger" value="{{ $address['phone_messanger'] }}" class="form-control" id="phone_messanger">	
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

