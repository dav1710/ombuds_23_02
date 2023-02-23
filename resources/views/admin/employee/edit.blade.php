@extends('admin/layouts.admin_layout')

@section('title', 'Edit Employee')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/audio.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել Աշխատակից: {{ $employee['name_am'] }}</h1>
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
                        <form action="{{ route('employee.update', $employee['id']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name_am">Անուն Հայերեն</label>
                                    <input value="{{ $employee->name_am }}" type="text" name="name_am"
                                        class="form-control" id="name_am" placeholder="Մուտքագրել Անուն Հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="name_en">Անուն Անգլերեն</label>
                                    <input type="text" value="{{ $employee->name_en }}" name="name_en"
                                        class="form-control" id="name_en" placeholder="Մուտքագրել Անուն Անգլերեն">
                                </div>

                                <div class="form-group">
                                    <label for="employee">Պաշտոնը Հայերեն</label>
                                    <input type="text" value="{{ $employee->position_am }}" name="position_am"
                                        class="form-control" id="employee" placeholder="Մուտքագրել Պաշտոնը Հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="employee">Պաշտոնը Անգլերեն</label>
                                    <input type="text" value="{{ $employee->position_en }}" name="position_en"
                                        class="form-control" id="employee" placeholder="Մուտքագրել Պաշտոնը Անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="content_am">Կենսագրություն հայերեն</label>
                                    <textarea id="editor" name="content_am">{{ $employee->content_am }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content_en">Կենսագրություն անգլերեն</label>
                                    <textarea id="editor2" name="content_en">{{ $employee->content_en }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Հեռախոսահամար</label>
                                    <input type="text" value="{{ $employee->phone }}" name="phone" class="form-control" id="phone"
                                        placeholder="Մուտքագրել Հեռախոսահամար">
                                </div>
                                <div class="form-group">
                                    <label for="email">Էլ֊հասցե</label>
                                    <input type="email" value="{{ $employee->email }}" name="email" class="form-control" id="email"
                                        placeholder="Մուտքագրել Էլ֊հասցե">
                                </div>
                                <div class="form-group">
                                    <label for="fb_link">Facebook</label>
                                    <input type="url" value="{{ $employee->fb_link }}" name="fb_link" class="form-control" id="fb_link"
                                        placeholder="Մուտքագրել facebook-ի հղում">
                                </div>
                                <div class="form-group">
                                    <label for="twitter_link">Twitter</label>
                                    <input type="url"  value="{{ $employee->twitter_link }}" name="twitter_link" class="form-control" id="twitter_link"
                                        placeholder="Մուտքագրել twitter-ի հղում">
                                </div>
                                <div class="form-group">
                                    <label for="img">Նկար</label>
                                    <input type="file" name="img" class="form-control" id="img">
                                    @if ($employee->img)
                                        <img height="150" src="{{ asset('uploads/employees/' . $employee->img) }}">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="audio_am">Աուդիո հայերեն</label>
                                    <input type="file" name="audio_am" class="form-control" id="audio_am">
                                    @if ($employee->audio_am)
                                        <div class="audio-player mt-1">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/employees/' . $employee->audio_am) }}" type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="audio_en">Աուդիո անգլերեն</label>
                                    <input type="file" name="audio_en" class="form-control" id="audio_en">
                                    @if ($employee->audio_en)
                                        <div class="audio-player mt-1">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/mediaFiles/' . $employee->audio_am) }}" type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="audio2_am mt-2">Աուդիո 2 հայերեն</label>
                                    <input type="file" name="audio2_am" class="form-control" id="audio2_am">
                                    @if ($employee->audio2_am)
                                        <div class="audio-player mt-1">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/employees/' . $employee->audio2_am) }}" type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="audio2_en">Աուդիո 2 անգլերեն</label>
                                    <input type="file" name="audio2_en" class="form-control" id="audio2_en">
                                    @if ($employee->audio2_en)
                                        <div class="audio-player mt-1">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/employees/' . $employee->audio2_en) }}" type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                    @endif
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
