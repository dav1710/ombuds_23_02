@extends('admin/layouts.admin_layout')

@section('title', 'All Employees')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Աշխատակիցները</h1>
					<a href="{{ route('employee.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
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
                                    Անուն
                                </th>
                                <th>
                                    Պաշտոն
                                </th>
                                <th>
                                    Սոցիալ
                                </th>

                                <th>
                                    Բովանդակություն
                                </th>
                                <th>
                                    Մեդիա
                                 </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employee as $item)
                            <tr>
                                <td>
                                    {{ $item['id'] }}
                                </td>

                                <td>
                                    {{ $item['name_am'] }}<br>
                                    {{ $item['name_en'] }}
                                </td>
								<td>
                                    {{ $item['position_am'] }}<br>
                                    {{ $item['position_en'] }}
                                </td>
                                <td>
                                    {{ $item['phone'] }}<br>
                                    {{ $item['email'] }}<br>
                                    {{ $item['fb_link'] }}<br>
                                    {{ $item['twitter_link'] }}
                                </td>
                                <td>
                                    {!! $item['content_am'] !!}
                                </td>                                
                                <td>
                                    @php $files = [$item['audio_am'], $item['audio_en'], $item['audio2_am'], $item['audio2_en'], $item['img']]; @endphp
									@foreach($files as $file)
										@if($file)
											@php $extension = substr($file, strrpos($file, '.') + 1, strlen($file)) @endphp
											@if($extension == 'mp3' || $extension == 'mp2')
												<div class="audio-player">
													<audio controls controlsList="nodownload noplaybackrate">
														<source src="{{ asset('uploads/employees/' . $file) }}" type="audio/mpeg">
														Your Browser Does Not Support the radio.
													</audio>
												</div>
		
											@else				
												<img height="150" width="150" src="{{ asset('uploads/employees/' . $file) }}">
											@endif
										@endif
									@endforeach
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('employee.edit', $item['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Փոփոխել
                                    </a>
                                   <form action="{{ route('employee.destroy', $item['id']) }}" method="POST" style="display: inline-block">
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
