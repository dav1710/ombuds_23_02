@extends('admin/layouts.admin_layout')

@section('title', 'All StaticTexts')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Տեքստերը</h1>
                    <a href="{{ route('staticText.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
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
                                <th style="max-width: 1%">
                                    ID
                                </th>
                                <th>
                                    Էջ
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staticText as $item)
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
                                    <td style="max-width: 300px">
                                        {!! html_entity_decode($item['content_am']) !!}<br>
                                        {!! html_entity_decode($item['content_en']) !!}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-info btn-sm"
                                            href="{{ route('staticText.edit', $item['id']) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Փոփոխել
                                        </a>
                                        <form action="{{ route('staticText.destroy', $item['id']) }}" method="POST"
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
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                        </div>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
