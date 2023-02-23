@extends('admin/layouts.admin_layout')

@section('title', 'All Ombudsmen')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Պաշտպանները</h1>
					<a href="{{ route('ombudsman.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
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
                                    Կարգավիճակ
                                </th>
                                <th>
                                    Նկար
                                </th>
                                <th>
                                    Անուն
                                </th>
                                <th>
                                    Թեմա
                                </th>
                                <th>
                                   Բովանդակություն
                                </th>
                                <th>
                                   Սոցիալ
                                </th>
                                <th>
                                   Աուդիոֆայլեր
                                </th>
                                <th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ombudsman as $item)
                            <tr>
                                <td>
                                    {{ $item['id'] }}
                                </td>
								<td style="width: 1%">
									@if($item->defender)
										Գործող պաշտպան
									@else
										Նախկին պաշտպան
									@endif
								</td>
								<td>
                                    @if($item->img)<img height="100" width="200" src="{{ asset('uploads/ombudsmen/' . $item['img']) }}">@endif
                                </td>
								
                                <td>
                                    {{ $item['name_am'] }}<br>
									{{ $item['name_en'] }}
                                </td>
								<td>
                                    {{ $item['subject_am'] }}<br>
									{{ $item['subject_en'] }}
                                </td>
								<td style="max-width: 100%;">
									{!! $item['content_am'] !!}<br>
                                    {!! $item['content_en'] !!}
                                </td>
								<td>
                                    {{ $item['phone'] }}<br>
									{{ $item['email'] }}<br>
									{{ $item['fb_link'] }}<br>
									{{ $item['twitter_link'] }}
                                </td>
								<td>
                                    {{ $item['phone'] }}<br>
									{{ $item['email'] }}<br>
									{{ $item['fb_link'] }}<br>
									{{ $item['twitter_link'] }}
                                </td>
								<td>
											@foreach($doctypes as $doctype)
												@if($item[$doctype])
														<div class="audio-player">
															<audio controls controlsList="nodownload noplaybackrate"> 
																<source src="{{ asset('uploads/ombudsman/' . $item[$doctype]) }}" type="audio/mpeg">
																Your Browser Does Not Support the radio.
															</audio>
														</div>											
												@endif
											@endforeach
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('ombudsman.edit', $item['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Փոփոխել
                                    </a>
                                   <form action="{{ route('ombudsman.destroy', $item['id']) }}" method="POST" style="display: inline-block">
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
