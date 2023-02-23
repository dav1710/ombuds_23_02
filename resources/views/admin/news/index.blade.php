@extends('admin/layouts.admin_layout')

@section('title', 'All News')

@section('styles')
<link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .media {
        justify-content: center;
    }

    .media div {
        width: 100%;
    }

    .modal.show .modal-dialog {
        min-width: 60%;
        position: absolute;
        left: 50%;
        top: 10%;
        transform: translateX(-50%);

    }

</style>

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Նորությունները</h1>
                    <a href="{{ route('news.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Ենթաէջ
                                </th>
                                <th>
                                    Վեռնագրեր
                                </th>
                                <th>
                                    Բովանդակություն
                                </th>
                                <th>
                                    Նկարներ
                                </th>
                                <th>
                                    Աուդիո Ֆայլեր
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $i => $item)
                                <tr>
                                    <td>
                                        {{ $item->id }}
                                    </td>
                                    <td>
                                        @foreach ($item->tabs as $tab)
                                            {{ $tab->name_am }}<br>
                                        @endforeach
                                    </td>
                                    <td class="truncate">
                                        <p>{{ $item->title_am }}</p>
                                    </td>
                                    <td class="truncate">
                                        @if (str_contains($item->content_am, 'figure'))
                                            @php
                                                $content = $item->content_am;
                                                $figure = substr($content, strpos($content, '<figure'), strpos($content, '</figure>') + strlen('</figure>'));
                                                $content = str_replace($figure, '', $content);
                                            @endphp
                                            <button class="btn btn-outline-info btn-sm modal-btn" type="button" data-toggle="modal" data-target="#modal_{{ $i }}">Տեսանյութ</button>

                                            <div data-content="{{ $figure }}" id="modal_{{ $i }}" class="modal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title">{{ $item->title_am }}</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body"></div>
                                                  </div>
                                                </div>
                                            </div>
                                            {!! $content !!}
                                        @else 
                                            {!! $item->content_am !!}
                                        @endif
                                        
                                    </td>
                                    <td>
                                        @if (count($item->images()) > 1)
                                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-indicators">
                                                    @for ($i = 0; $i < count($item->images()); $i++)
                                                        <li type="button" data-target="#carouselExampleCaptions" data-slide-to="{{ $i }}"
                                                        class="slider_custom_button" aria-current="true" aria-label="Slide {{ $i }}"></li>
                                                    @endfor
                                                </div>
                                                <div class="carousel-inner">
                                                    @foreach ($item->images() as $img)
                                                        <div class="carousel-item">
                                                            <img loading="lazy" src="{{ asset('uploads/news/' . $img) }}" class="d-block w-100 h-100" alt="...">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            @isset ($item->images()[0])
                                                <img loading="lazy" src="{{ asset('uploads/news/' . $item->images()[0]) }}" class="d-block w-100 h-100" alt="...">
                                            @endisset
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($item->audios() as $audio)
                                            @if($audio)
                                                <div class="audio-player">
                                                    <audio controls controlsList="nodownload noplaybackrate">
                                                        <source src="{{ asset('uploads/news/' . $audio) }}"
                                                            type="audio/mpeg">
                                                        Your Browser Does Not Support the radio.
                                                    </audio>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-info btn-sm" href="{{ route('news.edit', $item->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Փոփոխել
                                        </a>
                                        <form action="{{ route('news.destroy', $item->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm delete-btn">
                                                <i class="fas fa-trash">
                                                </i>
                                                Ջնջել
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="pagination mb-2">
                {{ $news->links() }}
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


@section('scripts')
    <script>
        $('.carousel-item:first').addClass('active');
        $('.carousel-indicators li:first').addClass('active');

        $(document).ready(function () {
            $('.modal').modal({
                show: false
            });

            $('.modal-btn').on('click', function () {
                let modal = $($(this).data('target'));
                let content = modal.find('.modal-body');
                content.text('');
                content.append(modal.data('content'));
            });
        });
    </script>
@endsection
