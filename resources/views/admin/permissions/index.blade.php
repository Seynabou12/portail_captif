@extends('layouts.base')

@section('css')
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Permissions</a></li>
                </ol>
            </div>
            <div class="row">

                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Listes des Permissions</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom de la Permission</th>
                                            <th>Guard Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->guard_name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <!-- Datatable -->
    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/js/plugins-init/datatables.init.js"></script>
@endsection
