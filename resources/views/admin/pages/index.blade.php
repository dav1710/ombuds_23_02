@extends('admin/layouts.admin_layout')

@section('title', 'All Pages')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Էջերը</h1>
                    <a href="{{ route('page.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
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
                                    էջ
                                </th>
                                <th>
                                    Վերնագիր
                                </th>
                                <th>
                                    Թեմա
                                </th>
                                <th>
                                    Բովանդակություն
                                </th>
                                <th>
                                    ֆայլեր
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $item)

                                <tr>
                                    <td>
                                        {{ $item['id'] }}
                                    </td>
                                    <td>
                                        {{ $item['page'] }}
                                    </td>
                                    <td>
                                        {{ $item['title_am'] }}<br>
                                        {{ $item['title_en'] }}
                                    </td>
                                    <td>
                                        {{ $item['subject_am'] }}<br>
                                        {{ $item['subject_en'] }}
                                    </td>
                                    <td class="truncate">
                                        {!! $item['content_am'] !!}
                                    </td>
                                    <td>
                                        @foreach ($doctypes as $doctype)
                                            @if ($item[$doctype])
                                                
                                                @php $ext = substr($item[$doctype], strrpos($item[$doctype], '.') + 1, strlen($item[$doctype])) @endphp
                                                
                                                @if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg')
                                                    <img height="100"
                                                        src="{{ asset('uploads/pages/' . $item[$doctype]) }}">
                                                @elseif ($ext == 'mp3' || $doctype == 'mp2')
                                                    <div class="audio-player">
                                                        <audio controls controlsList="nodownload noplaybackrate">
                                                            <source src="{{ asset('uploads/pages/' . $item[$doctype]) }}"
                                                                type="audio/mpeg">
                                                            Your Browser Does Not Support the radio.
                                                        </audio>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>

                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-info btn-sm" href="{{ route('page.edit', $item['id']) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Փոփոխել
                                        </a>
                                        <form action="{{ route('page.destroy', $item['id']) }}" method="POST"
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
        </div>
    </section>
    <!-- /.content -->
@endsection
