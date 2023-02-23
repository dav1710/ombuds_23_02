@extends('admin/layouts.admin_layout')

@section('title', 'Add News')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել նորություն</h1>
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
                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tabs">Ենթաէջեր</label>
                                    <select id="tabs" class="selectpicker" name="tabs[]" multiple
                                        aria-label="Default select example" data-live-search="true" required>
                                        @foreach ($tabs as $item)
                                            @if ($item->sort_tabs == 'news')
                                                <option value="{{ $item->id }}">{{ $item->name_am }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title_am">Վերնագիր Հայերեն</label>
                                    <input type="text" name="title_am" class="form-control" id="title_am"
                                        placeholder="Մուտքագրել վերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_am">Վերնագիր Անգլերեն</label>
                                    <input type="text" name="title_en" class="form-control" id="title_am"
                                        placeholder="Մուտքագրել վերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="content_am">Բովանդակություն Հայերեն</label>
                                    <textarea id="editor" name="content_am" placeholder="Մուտքագրել բովանդակություն հայերեն">
                                </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content_en">Բովանդակություն Անգլերեն</label>
                                    <textarea id="editor2" name="content_en" placeholder="Մուտքագրել բովանդակություն անգլերեն"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file_am">Հայերեն Նկար (Քանակը՝ մեկ կամ ավելի)</label>
                                    <input type="file" name="file_am[]" class="form-control" id="file_am" multiple>
                                </div>
                                <div class="form-group">
                                    <label for="file_en">Անգլերեն Նկար (Քանակը՝ մեկ կամ ավելի)</label>
                                    <input type="file" name="file_en[]" class="form-control" id="file_en" multiple>

                                </div>
                                <div class="form-group">
                                    <label for="audio_am">Հայերեն Աուդիո </label>
                                    <input type="file" name="audio_am" class="form-control" id="audio_am"
                                        placeholder="Choose File">

                                </div>
                                <div class="form-group">
                                    <label for="audio_en">Անգլերեն Աուդիո </label>
                                    <input type="file" name="audio_en" class="form-control" id="audio_en"
                                        placeholder="Choose File">

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
                                <button type="submit" class="btn btn-primary">+ Ավելացնել էջ</button>
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
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList']
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor2'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
