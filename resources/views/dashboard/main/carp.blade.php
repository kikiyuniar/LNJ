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
                                    <th>CARP_Code</th>
                                    <th>Category</th>
                                    <th>Initiators</th>
                                    <th>Initiators Div</th>
                                    <th>Initiators Branch</th>
                                    <th>Recipients</th>
                                    <th>Recipients Div</th>
                                    <th>Recipients Branch</th>
                                    <th>Verified By</th>
                                    <th>Due Date</th>
                                    <th>Effectiveness</th>
                                    <th>Status Date</th>
                                    <th>Stage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>CARP_Code</th>
                                    <th>Category</th>
                                    <th>Initiators</th>
                                    <th>Initiators Div</th>
                                    <th>Initiators Branch</th>
                                    <th>Recipients</th>
                                    <th>Recipients Div</th>
                                    <th>Recipients Branch</th>
                                    <th>Verified By</th>
                                    <th>Due Date</th>
                                    <th>Effectiveness</th>
                                    <th>Status Date</th>
                                    <th>Stage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($carp as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$item->carp_code}}</td>
                                    <td>{{$item->category}}</td>
                                    <td>{{$item->initiators}}</td>
                                    <td>{{$item->initiators_div}}</td>
                                    <td>{{$item->initiators_branch}}</td>
                                    <td>{{$item->recipients}}</td>
                                    <td>{{$item->recipients_div}}</td>
                                    <td>{{$item->recipients_branch}}</td>
                                    <td>{{$item->verified_by}}</td>
                                    <td>{{$item->due_date}}</td>
                                    <td>{{$item->effectiveness}}</td>
                                    <td>{{$item->status_date}}</td>
                                    <td>{{$item->stage}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a href="{{url('edit_carp')}}/{{ $item->carpid }}" class="btn btn-outline-warning">Edit</a>
                                        <a href="{{url('action_del_carp')}}/{{ $item->carpid }}" onclick="return confirm('Delete {{$item->carp_code}} Are you sure?,\nYou wont be able to revert this!?')" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection