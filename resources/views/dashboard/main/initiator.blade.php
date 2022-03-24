@extends('dashboard.master.app')
@section('main')

        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Initiator</h1>
            </div>
            @if (session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Initiators</th>
                                    <th>Initiators Div</th>
                                    <th>Initiator Branch</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Initiators</th>
                                    <th>Initiators Div</th>
                                    <th>Initiator Branch</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($initiator as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$item->initiators}}</td>
                                    <td>{{$item->initiators_div}}</td>
                                    <td>{{$item->initiators_branch}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modalForm{{ $item->id}}">Edit</button>
                                        <a href="{{url('action_del_initiator')}}/{{ $item->id }}" onclick="return confirm('Delete {{$item->initiators}} Are you sure?,\nYou wont be able to revert this!?')" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal Form Initiator --> 
@foreach ($initiator as $item)
    <div class="modal fade" id="modalForm{{$item->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Initiator</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('action_edit_initiator')}}/{{$item->id}}" class="form-validate is-alter" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Initiator</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="full-name" value="{{$item->initiators}}" required name="initiators">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Initiator Div</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="{{$item->initiators_div}}" name="initiators_div" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Initiator Branch</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="{{$item->initiators_branch}}" name="initiators_branch" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                            <a href=" " class="btn btn-lg btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection