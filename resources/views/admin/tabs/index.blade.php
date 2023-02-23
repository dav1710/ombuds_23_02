@extends('admin/layouts.admin_layout')

@section('title', 'All Tabs')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Ենթաէջերը</h1>
                    <a href="{{ route('tab.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
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
                                <th style="width: 1%">
                                    ID
                                </th>
                                <th style="width: 20%">
                                    Անունը
                                </th>
                                <th style="width: 30%">
                                    Անունը Հայերեն
                                </th>
                                <th style="width: 30%">
                                    Անունը Անգլերեն
                                </th>
                                <th style="width: 30%">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tabs as $item)
                            <tr>
                                <td>
                                    {{ $item['id'] }}
                                </td>
                                <td>
                                    {{ $item['name'] }}
                                </td>
                                <td>
                                    {{ $item['name_am'] }}
                                </td>
                                <td>
                                    {{ $item['name_en'] }}
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('tab.edit', $item['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Փոփոխել
                                    </a>
                                   <form action="{{ route('tab.destroy', $item['id']) }}" method="POST" style="display: inline-block">
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
