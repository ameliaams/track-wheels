@extends('layouts.admin')

@section('title', 'Driver List')

@section('content')
<div class="main-container">
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Driver List</h4>
            </div>
            <div class="pull-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDriverModal">
                    <i class="fa fa-plus"></i> Add Driver
                </button>
            </div>
        </div>

        @if($drivers)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Driver's License</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drivers as $d)
                <tr>
                    <td>{{ $d->driver_id}}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->nomor_sim }}</td>
                    <td>{{ $d->no_telepon }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

<!-- Add Driver Modal -->
<div class="modal fade" id="addDriverModal" tabindex="-1" aria-labelledby="addDriverModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDriverModalLabel">Add Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.driver.store') }}">
                @csrf
                <div class="modal-body">
                    <!-- Driver form fields -->
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_sim">Driver's License</label>
                        <input type="text" class="form-control" id="nomor_sim" name="nomor_sim" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">Phone Number</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection