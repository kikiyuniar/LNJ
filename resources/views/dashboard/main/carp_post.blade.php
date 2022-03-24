@extends('dashboard.master.app')
@section('main')
        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">CARP</h1>
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
                            Form Input CARP
                        </div>
                        <div class="card-body">
                            <form action="{{route('post.carp')}}" method="post">
                                @csrf
                                
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Select Initiator</label>
                                    <div class="col-sm-8">
                                    <select required class="custom-select" aria-label="Default select example" name="initiator_id">
                                        <option disabled selected>Select Initiator</option>
                                        @foreach ($initiator as $item)
                                            <option value="{{$item->id}}">{{$item->initiators}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Select Recipient</label>
                                    <div class="col-sm-8">
                                    <select required class="custom-select" aria-label="Default select example" name="recipient_id">
                                        <option disabled selected>Select Recipient</option>
                                        @foreach ($recipient as $item)
                                            <option value="{{$item->id}}">{{$item->recipients}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="initiator_div" class="col-sm-4 col-form-label">Category</label>
                                    <div class="col-sm-8">
                                        <input required type="text" class="form-control" id="initiator_div" name="category">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Verified By</label>
                                    <div class="col-sm-8">
                                        <input required type="text" class="form-control" name="verified_by">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Due Date</label>
                                    <div class="col-sm-8">
                                        <input required type="date" class="form-control" name="due_date">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Select Effectiveness</label>
                                    <div class="col-sm-8">
                                    <select required class="custom-select" aria-label="Default select example" name="effectiveness">
                                        <option disabled selected>Select Effective</option>
                                            <option value="effective">Effective</option>
                                            <option value="not effective">Not Effective</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Status Date</label>
                                    <div class="col-sm-8">
                                        <input required type="date" class="form-control" name="status_date">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Stage</label>
                                    <div class="col-sm-8">
                                    <select required class="custom-select" aria-label="Default select example" name="stage">
                                        <option disabled selected>Select Stage</option>
                                        <option value="open">Open</option>
                                            <option value="closed">Closed</option>
                                            <option value="voided">Voided</option>
                                            <option value="re-open">Re-Open</option>
                                            <option value="verified">Verified</option>
                                            <option value="responded">Responded</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Satus</label>
                                    <div class="col-sm-8">
                                    <select required class="custom-select" aria-label="Default select example" name="status">
                                        <option disabled selected>Select Status</option>
                                        <option value="open">Open</option>
                                            <option value="closed">Closed</option>
                                            <option value="canceled">Canceled</option>
                                    </select>
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