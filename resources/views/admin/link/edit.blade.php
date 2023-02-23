@extends('admin/layouts.admin_layout')

@section('title', 'Edit Address')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել Հղումները</h1>
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
                        <form action="{{ route('link.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="hot_line">Թեժ գիծ:</label>
                                    <input type="number" name="hot_line" value="{{ $link['hot_line'] }}"
                                        class="form-control" id="hot_line">
                                </div>
                                <div class="form-group">
                                    <label for="phone_am">Աշխատաժամ հայերեն:</label>
                                    <input type="text" name="phone_am" value="{{ $link['phone_am'] }}" class="form-control"
                                        id="phone_am">
                                </div>
                                <div class="form-group">
                                    <label for="phone_en">Աշխատաժամ անգլերեն:</label>
                                    <input type="text" name="phone_en" value="{{ $link['phone_en'] }}" class="form-control"
                                        id="phone_en">
                                </div>
                                <div class="form-group">
                                    <label for="mail">Էլ-հասցե:</label>
                                    <input type="text" name="mail" value="{{ $link['mail'] }}" class="form-control"
                                        id="mail">
                                </div>
                                <div class="form-group">
                                    <label for="location_am">Հասցեի անվանում հայերեն:</label>
                                    <input type="text" name="location_am" value="{{ $link['location_am'] }}"
                                        class="form-control" id="location_am">
                                </div>
                                <div class="form-group">
                                    <label for="location_en">Հասցեի անվանում անգլերեն :</label>
                                    <input type="text" name="location_en" value="{{ $link['location_en'] }}"
                                        class="form-control" id="location_en">
                                </div>
                                <div class="form-group">
                                    <label for="location">Հասցեի հղում:</label>
                                    <input type="text" name="location" value="{{ $link['location'] }}"
                                        class="form-control" id="location">
                                </div>
                                <div class="form-group">
                                    <label for="web_name">Կայքի անվանում:</label>
                                    <input type="text" name="web_name" value="{{ $link['web_name'] }}"
                                        class="form-control" id="web_name">
                                </div>
                                <div class="form-group">
                                    <label for="web">Կայքի հղում:</label>
                                    <input type="url" name="web" value="{{ $link['web'] }}" class="form-control"
                                        id="web">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook:</label>
                                    <input type="url" name="facebook" value="{{ $link['facebook'] }}"
                                        class="form-control" id="facebook">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram:</label>
                                    <input type="url" name="instagram" value="{{ $link['instagram'] }}"
                                        class="form-control" id="instagram">
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter:</label>
                                    <input type="url" name="twitter" value="{{ $link['twitter'] }}"
                                        class="form-control" id="twitter">
                                </div>
                                <div class="form-group">
                                    <label for="telegram">Telegram:</label>
                                    <input type="url" name="telegram" value="{{ $link['telegram'] }}"
                                        class="form-control" id="telegram">
                                </div>
                                <div class="form-group">
                                    <label for="messenger">Messenger:</label>
                                    <input type="url" name="messenger" value="{{ $link['messenger'] }}"
                                        class="form-control" id="messenger">
                                </div>
                                <div class="form-group">
                                    <label for="e-gov">e-gov:</label>
                                    <input type="url" name="e-gov" value="{{ $link['e-gov'] }}"
                                        class="form-control" id="e-gov">
                                </div>
                                <div class="form-group">
                                    <label for="e-request">e-request:</label>
                                    <input type="url" name="e-request" value="{{ $link['e-request'] }}"
                                        class="form-control" id="e-request">
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
