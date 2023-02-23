@extends('admin/layouts.admin_layout')

@section('title', 'All Documents')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Փաստաթղթերը</h1>
					<a href="{{ route('document.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
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
                                    Ենթաէջ
                                </th>
                                <th>
                                    Վերնագիր
                                </th>
                                <th>
                                    Ֆայլեր
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($document as $item)
				                    <tr>
				                        <td>
				                            {{ $item['id'] }}
				                        </td>
				                        <td>
                                            @foreach($item->tabs as $tab)
				                                {{ $tab->name_am }}
                                            @endforeach
				                        </td>
				                        <td>
				                            {{ $item['title_am'] }}<br>
											{{ $item['title_en'] }}
				                        </td>
				                        <td>
											@foreach($doctypes as $doctype)
												@if($item[$doctype])
													<a target="_blank" href="{{ route('document.show', $item['id']) }}">{{ $doctype }}</a><br>
												@endif
											@endforeach
				                        </td>

				                        <td class="project-actions text-right">
				                            <a class="btn btn-outline-info btn-sm" href="{{ route('document.edit', $item['id']) }}">
				                                <i class="fas fa-pencil-alt">
				                                </i>
				                                Փոփոխել
				                            </a>
				                           <form action="{{ route('document.destroy', $item['id']) }}" method="POST" style="display: inline-block">
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
