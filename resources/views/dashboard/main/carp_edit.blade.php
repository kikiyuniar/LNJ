@extends('dashboard.master.app')
@section('main')
        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit CARP</h1>
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
                            @foreach ($carp as $item1)
                            <form action="{{url('action_edit_carp')}}/{{$item1->id}}" method="post">
                                @csrf
                                <input type="text" value="{{$item1->id}}" hidden>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Select Initiator</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" aria-label="Default select example" name="initiator_id">
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
                                    <select class="custom-select" aria-label="Default select example" name="recipient_id">
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
                                        <input type="text" value="{{$item1->category}}" class="form-control" id="initiator_div" name="category">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Verified By</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$item1->verified_by}}" name="verified_by">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Due Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" value="{{$item1->due_date}}" name="due_date">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Select Effectiveness</label>
                                    <div class="col-sm-8">
                                    <select class="custom-select" aria-label="Default select example" name="effectiveness">
                                        <option disabled selected>Select Effective</option>
                                        <option value="effective">Effective</option>
                                            <option value="not effective">Not Effective</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Status Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" value="{{$item1->status_date}}" class="form-control" name="status_date">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label  class="col-sm-4 col-form-label">Stage</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" aria-label="Default select example" name="stage">
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
                                        <select class="custom-select" aria-label="Default select example" name="status">
                                            <option disabled selected>Select Status</option>
                                            <option value="open">Open</option>
                                            <option value="closed">Closed</option>
                                            <option value="canceled">Canceled</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{url('carp')}}" class="btn btn-danger">Cancel</a>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection