@extends('admin/layouts.admin_layout')

@section('title', 'Add Tab')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել Ենթաէջ</h1>
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
                   <form action="{{ route('tab.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="card-body">
                           <div class="form-group">
                               <label for="exampleInputEmail1">Անունը</label>
                               <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Անունը" required>
                           </div>
                           <div class="form-group">
                               <label for="exampleInputEmail2">Անունը Հայերեն</label>
                               <input type="text" name="name_am" class="form-control" id="exampleInputEmail2" placeholder="Հայերեն անունը" required>
                           </div>
                           <div class="form-group">
                               <label for="exampleInputEmail3">Անունը Անգլերեն</label>
                               <input type="text" name="name_en" class="form-control" id="exampleInputEmail3" placeholder="English name" required>
                           </div>
                       </div>


                       <div class="card-footer">
                           <button type="submit" class="btn btn-primary">Ավելացնել</button>
                       </div>
                   </form>

               </div>
               </div>
           </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
