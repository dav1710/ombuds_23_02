@extends('admin/layouts.admin_layout')

@section('title', 'All Applicants')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Դիմումները</h1>
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
                                    Անուն, Ազգանուն
                                </th>
                                <th>
                                    Թեմա
                                </th>
                                <th>
                                    Էլ-հասցե
                                </th>
                                <th>
                                    Բովանդակություն
                                </th>
                                <th>
                                    ֆայլ
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicants as $item)
                                <tr>
                                    <td>
                                        {{ $item['id'] }}
                                    </td>
                                    <td>
                                        {{ $item['name'] }}
                                    </td>
                                    <td>
                                        {{ $item['subject'] }}<br>
                                    </td>
                                    <td>
                                        {{ $item['email'] }}<br>
                                    </td>
                                    <td style="max-width: 300px">
                                        {!! $item['message'] !!}<br>
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ asset('uploads/applicants/' . $item['file']) }}">Ֆայլ</a>
                                    </td>

                                    <td class="project-actions text-right">
                                        <form action="{{ route('applicant.destroy', $item['id']) }}" method="POST"
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
