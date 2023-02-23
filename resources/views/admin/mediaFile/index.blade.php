@extends('admin/layouts.admin_layout')

@section('title', 'All mediaFiles')

@section('styles')
<link href="{{ asset('css/audio.css?v=' . date('YmdHis')) }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր ձայնային կառավարումները</h1>
					<a href="{{ route('mediaFile.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
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
									Ֆայլ
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mediaFile as $item)
							@php $files = [$item['file_am'], $item['file_en']]; @endphp
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
									@foreach($files as $file)
										@if($file)
											@php $extension = substr($file, strrpos($file, '.') + 1, strlen($file)) @endphp
											@if($extension == 'mp3' || $extension == 'mp2')
												<div class="audio-player">
													<audio controls controlsList="nodownload noplaybackrate">
														<source src="{{ asset('uploads/mediaFiles/' . $file) }}" type="audio/mpeg">
														Your Browser Does Not Support the radio.
													</audio>
												</div>
		
											@elseif($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg')				
												<img height="100" width="200" src="{{ asset('uploads/mediaFiles/' . $file) }}">
											@else
												<div class="video-player">
													<video class="w-100 border rounded" height=400 controls controlsList="nodownload noplaybackrate" disablepictureinpicture>
														<source src="{{ asset('uploads/mediaFiles/' . $file) }}" type="video/mp4">
														Your browser does not support the video.
													</video>
												</div>
											@endif
										@endif
									@endforeach
								</td>
								<td>
									{{ $item['phone'] }}<br>
									{{ $item['phone_messanger'] }}
								</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('mediaFile.edit', $item['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Փոփոխել
                                    </a>
                                   <form action="{{ route('mediaFile.destroy', $item['id']) }}" method="POST" style="display: inline-block">
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
