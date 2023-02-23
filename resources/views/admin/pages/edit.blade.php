@extends('admin/layouts.admin_layout')

@section('title', 'Edit Page')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել Էջը: {{ $page['name_am'] }}</h1>
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
                        <form action="{{ route('page.update', $page['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <select id="page" class="selectpicker" name="page"
                                    aria-label="Default select example" data-live-search="true">
                                    @foreach ($tabs as $item)
                                        @if ($item->sort_tabs == 'pages')
                                            <option value="{{ $item->name }}" @if($page->page == $item->name) selected @endif>{{ $item->name_am }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="title_am">Վերնագիր հայերեն</label>
                                    <input type="text" value="{{ $page['title_am'] }}" name="title_am" class="form-control" id="title_am"
                                        placeholder="Մուտքագրել Վերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Վերնագիր անգլերեն</label>
                                    <input type="text" value="{{ $page['title_en'] }}" name="title_en" class="form-control" id="title_en"
                                        placeholder="Մուտքագրել Վերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="subject_am">Թեմա հայերեն</label>
                                    <input type="text" value="{{ $page['subject_am'] }}" name="subject_am" class="form-control" id="subject_am"
                                        placeholder="Մուտքագրել Թեմա հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="subject_en">Թեմա անգլերեն</label>
                                    <input type="text" value="{{ $page['subject_en'] }}" name="subject_en" class="form-control" id="subject_en"
                                        placeholder="Մուտքագրել Թեմա անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="content_am">Բովանդակություն հայերեն</label>
                                    <textarea id="editor" name="content_am">{{ $page['content_am'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content_en">Բովանդակություն անգլերեն</label>
                                    <textarea id="editor2" name="content_en">{{ $page['content_en'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file_am">Ֆայլ հայերեն (Նկար, աուդիո, վիդեո)</label>
                                    <input type="file" name="file_am" class="form-control" id="file_am">
                                </div>
                                <div class="form-group">
                                    <label for="file_en">Ֆայլ անգլերեն (Նկար, աուդիո, վիդեո)</label>
                                    <input type="file" name="file_en" class="form-control" id="file_en">
                                </div>
                                <div class="form-group">
                                    <label for="file2_am">Ֆայլ 2 հայերեն (Նկար, աուդիո, վիդեո)</label>
                                    <input type="file" name="file2_am" class="form-control" id="file2_am">
                                </div>
                                <div class="form-group">
                                    <label for="file2_en">Ֆայլ 2 անգլերեն (Նկար, աուդիո, վիդեո)</label>
                                    <input type="file" name="file2_en" class="form-control" id="file2_en">
                                </div>
                                <div class="form-group">
                                    <label for="file3_am">Ֆայլ 3 հայերեն (Նկար, աուդիո, վիդեո)</label>
                                    <input type="file" name="file3_am" class="form-control" id="file3_am">
                                </div>
                                <div class="form-group">
                                    <label for="file3_en">Ֆայլ 3 անգլերեն (Նկար, աուդիո, վիդեո)</label>
                                    <input type="file" name="file3_en" class="form-control" id="file3_en">
                                </div>

                                <div class="form-group">
                                    <label for="document_am">Փաստաթուղթ հայերեն</label>
                                    <input type="file" name="document_am" class="form-control" id="document_am">
                                    <input type="text" name="document_title_am" class="form-control"
                                        id="document_title_am" placeholder="Մուտքագրել Վերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="document_en">Փաստաթուղթ անգլերեն</label>
                                    <input type="file" name="document_en" class="form-control" id="document_en">
                                    <input type="text" name="document_title_en" class="form-control"
                                        id="document_title_en" placeholder="Մուտքագրել Վերնագիր անգլերեն">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Պահպանել(Թարմացնել)</button>
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
                mediaEmbed: {
                        previewsInData:true
                    },
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor2'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                mediaEmbed: {
                        previewsInData:true
                    },
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
