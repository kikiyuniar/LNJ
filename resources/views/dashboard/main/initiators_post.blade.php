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
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            Form Input Initiator
                        </div>
                        <div class="card-body">
                            <form action="{{route('post.initiator')}}" method="post">
                                @csrf
                                
                                <div class="row mb-3">
                                    <label for="initiator" class="col-sm-4 col-form-label">Initiator</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="initiator" name="initiators">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="initiator_div" class="col-sm-4 col-form-label">Initiator Div</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="initiator_div" name="initiators_div">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="initiator_branch" class="col-sm-4 col-form-label">Initiator Branch</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="initiator_branch" name="initiators_branch">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img width="100%" src="{{url('dhb')}}/img/undraw_folder_files_re_2cbm.svg" alt="">
                </div>
            </div>

        </div>

@endsection