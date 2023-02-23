@extends('admin/layouts.admin_layout')

@section('title', 'All Slides')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր  Սլայդները</h1>
					<a href="{{ route('slide.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
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
                                    Վերնագիր
                                </th>
                                <th>
                                    Նկար
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slide as $item)
                            <tr>
                                <td>
                                    {{ $item['id'] }}
                                </td>
                                <td>
                                    {!! $item['title_am'] !!}<br>
                                    {!! $item['title_en'] !!}
                                </td>
								<td>
									<img height="100" width="200" src="{{ asset('uploads/slides/' . $item['img']) }}">
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('slide.edit', $item['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Փոփոխել
                                    </a>
                                   <form action="{{ route('slide.destroy', $item['id']) }}" method="POST" style="display: inline-block">
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
						@if(session('success'))
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
