@extends('admin/layouts.admin_layout')

@section('title', 'Փոփոխել Նորություն')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել Նորությունը: {{ $news['title_am'] }}</h1>
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
                        <form action="{{ route('news.update', $news['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
		                       <div class="form-group">
		                            <label for="tabs">Ենթաէջեր</label>
		                           <select id="tabs" class="selectpicker" name="tabs[]" multiple aria-label="Default select example" data-live-search="true">
		                            @foreach ($tabs as $item)
                                        @if ($item->sort_tabs == 'news')
                                            <option value="{{ $item->id }}" {{ in_array($news['id'], $item->news->pluck('id')->toArray()) ? 'selected' : ''}}>
                                                {{ $item->name_am }}
                                            </option>
                                        @endif
		                            @endforeach
		                            </select>
		                       </div>
                                <div class="form-group">
                                    <label for="title_am">Վերնագիր Հայերեն</label>
                                    <input type="text" value="{{ $news['title_am'] }}" name="title_am" class="form-control" id="title_am" placeholder="Մուտքագրել վերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Վերնագիր Անգլերեն</label>
                                    <input type="text" value="{{ $news['title_en'] }}" name="title_en" class="form-control" id="title_en" placeholder="Մուտքագրել վերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="content_am">Բովանդակություն Հայերեն</label>
                                    <textarea id="editor" name="content_am" class="form-control" id="content_am" placeholder="Մուտքագրել բովանդակություն հայերեն">{{ $news['content_am'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content_en">Բովանդակություն Անգլերեն</label>
                                    <textarea id="editor2" name="content_en" class="form-control" id="content_en" placeholder="Մուտքագրել բովանդակություն անգլերեն">{{ $news['content_en'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file_am">Հայերեն Նկար (Քանակը՝ մեկ կամ ավելի)</label>
                                    <input type="file" class="form-control" id="file_am" name="file_am[]" multiple>
                                    @if($news['file_am'])
                                            @foreach (json_decode($news['file_am']) as $img)
                                                <img height="80" src="{{ asset('uploads/news/' . $img) }}" alt="file_am">
                                            @endforeach
									@endif
                                </div>
                                <div class="form-group">
                                    <label for="file_en">Անգլերեն Նկար (Քանակը՝ մեկ կամ ավելի)</label>
                                    <input type="file" class="form-control" id="file_en" name="file_en[]" multiple>
                                    @if($news['file_en'])
                                            @foreach (json_decode($news['file_en']) as $img)
                                                <img height="80" src="{{ asset('uploads/news/' . $img) }}" alt="file_am">
                                            @endforeach
									@endif
                                </div>
                                <div class="form-group">
                                    <label for="audio_am">Հայերեն Աուդիո </label>
                                    <input type="file" name="audio_am" class="form-control" id="audio_am"
                                        placeholder="Choose File">
                                        @if($news['audio_am'])
                                        <div class="audio-player">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/news/' . $news['audio_am']) }}" type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="audio_en">Անգլերեն Աուդիո </label>
                                    <input type="file" name="audio_en" class="form-control" id="audio_en"
                                        placeholder="Choose File">
                                        @if($news['audio_en'])
                                        <div class="audio-player">
                                            <audio controls controlsList="nodownload noplaybackrate">
                                                <source src="{{ asset('uploads/news/' . $news['audio_en']) }}" type="audio/mpeg">
                                                Your Browser Does Not Support the radio.
                                            </audio>
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label>Ամսաթիվ:</label>
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input name="created_at" value="{{ $news['created_at'] }}" max="{{ date('Y-m-d') }}" type="datetime-local" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd:mm:yyyy" data-mask="" inputmode="numeric">
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Պահպանել</button>
                            </div>

                            @if ($errors->any())
                                <div class="mt-3 alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
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
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList'],
                mediaEmbed: {
                        previewsInData:true
                    },
            })
            .catch(error => {
                console.error(error);
            });
</script>
@endsection
