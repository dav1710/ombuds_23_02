@extends('admin/layouts.admin_layout')

@section('title', 'All Addresses')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Հասցեները</h1>
					<a href="{{ route('address.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
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
                                    Մարզեր
                                </th>

                                <th>
                                    Աշխատաժամեր
                                </th>
                                <th>
									Հասցեներ
                                </th>
                                <th>
									Էլ֊հասցեներ
                                </th>
                                <th>
									Հեռախոսի համարներ
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($address as $item)
                            <tr>
                                <td>
                                    {{ $item['id'] }}
                                </td>
                                <td>
                                    {{ $item['region_am'] }}<br>
									{{ $item['region_en'] }}
                                </td>
								<td>
									{{ $item['work_time_am'] }}<br>
									{{ $item['work_time_en'] }}
								</td>
								<td>
									{{ $item['address_am'] }}<br>
									{{ $item['address_en'] }}
								</td>
								<td>
									{{ $item['mail'] }}
								</td>
								<td>
									{{ $item['phone'] }}<br>
									{{ $item['phone_messanger'] }}
								</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('address.edit', $item['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Փոփոխել
                                    </a>
                                   <form action="{{ route('address.destroy', $item['id']) }}" method="POST" style="display: inline-block">
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
