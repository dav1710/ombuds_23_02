@extends('admin/layouts.admin_layout')

@section('title', 'Links')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Հղումներ</h1>
                    <a class="btn btn-outline-success btn-sm ml-3" href="{{ route('link.edit') }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Փոփոխել
                    </a>
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
                    <table class="table table-hover">
                        <tbody class="text-nowrap">
                            <tr>
                                <!-- DATARK td-NERY CHJNJEL -->
                                <th>Թեժ գիծ:</th>
                                <td>{{ $link->hot_line }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Հեռախոս:</th>
                                <td>{{ $link->phone_am }}</td>
                                <td>{{ $link->phone_en }}</td>
                            </tr>
                            <tr>
                                <th>Էլ-հասցե:</th>
                                <td>{{ $link->mail }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Հասցե:</th>
                                <td>Հասցեի անվանում հայերեն: {{ $link->location_am }}<br>Հասցեի անվանում անգլերեն: {{ $link->location_en }}</td>
                                <td>Հասցեի հղում: {{ $link->location }}</td>
                            </tr>
                            <tr>
                                <th>Կայք:</th>
                                <td>Կայքի անվանում: {{ $link->web_name }}</td>
                                <td>Կայքի հղում: {{ $link->web }}</td>
                            </tr>
                            <tr>
                                <th>Facebook:</th>
                                <td>{{ $link->facebook }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Instagram:</th>
                                <td>{{ $link->instagram }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Twitter:</th>
                                <td>{{ $link->twitter }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Telegram:</th>
                                <td>{{ $link->telegram }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Messenger:</th>
                                <td>{{ $link->messenger }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>e-gov:</th>
                                <td>{{ $link['e-gov'] }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>e-request:</th>
                                <td>{{ $link['e-request'] }}</td>
                                <td></td>
                            </tr>
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
