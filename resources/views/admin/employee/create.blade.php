@extends('admin/layouts.admin_layout')

@section('title', 'Add Employee')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել Աշխատակից</h1>
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
                        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name_am">Անուն Հայերեն</label>
                                    <input type="text" name="name_am" class="form-control" id="name"
                                        placeholder="Մուտքագրել Անուն">
                                </div>
                                <div class="form-group">
                                    <label for="name_en">Անուն Անգլերեն</label>
                                    <input type="text" name="name_en" class="form-control" id="employee"
                                        placeholder="Մուտքագրել Աշխատակից">
                                </div>
                                <div class="form-group">
                                    <label for="position_am">Պաշտոնը Հայերեն</label>
                                    <input type="text" name="position_am" class="form-control" id="employee"
                                        placeholder="Մուտքագրել Պաշտոնը Հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="position_en">Պաշտոնը Անգլերեն</label>
                                    <input type="text" name="position_en" class="form-control" id="employee"
                                        placeholder="Մուտքագրել Պաշտոնը Անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Հեռախոսահամար</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Մուտքագրել Հեռախոսահամար">
                                </div>
                                <div class="form-group">
                                    <label for="email">Էլ֊հասցե</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Մուտքագրել Էլ֊հասցե">
                                </div>
                                <div class="form-group">
                                    <label for="twitter_link">Twitter</label>
                                    <input type="url" name="twitter_link" class="form-control" id="twitter_link"
                                        placeholder="Մուտքագրել twitter-ի հղում">
                                </div>
                                <div class="form-group">
                                    <label for="fb_link">Facebook</label>
                                    <input type="url" name="fb_link" class="form-control" id="fb_link"
                                        placeholder="Մուտքագրել facebook-ի հղում">
                                </div>
                                <div class="form-group">
                                    <label for="content_am">Կենսագրություն հայերեն</label>
                                    <textarea id="editor" name="content_am"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content_en">Կենսագրություն անգլերեն</label>
                                    <textarea id="editor2" name="content_en"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="img">Նկար</label>
                                    <input type="file" name="img" class="form-control" id="img">
                                </div>
                                <div class="form-group">
                                    <label for="audio_am">Աուդիո հայերեն</label>
                                    <input type="file" name="audio_am" class="form-control" id="audio_am">
                                </div>
                                <div class="form-group">
                                    <label for="audio_en">Աուդիո անգլերեն</label>
                                    <input type="file" name="audio_en" class="form-control" id="audio_en">					
                                </div>
                                <div class="form-group">
                                    <label for="audio2_am">Աուդիո 2 հայերեն</label>
                                    <input type="file" name="audio2_am" class="form-control" id="audio2_am">
                                </div>
                                <div class="form-group">
                                    <label for="audio2_en">Աուդիո 2 անգլերեն</label>
                                    <input type="file" name="audio2_en" class="form-control" id="audio2_en">					
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
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList'],
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor2'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
