@extends('layouts.admin')

@section('title', 'Vehicle List')

@section('content')
<div class="main-container">
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Vehicle List</h4>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addVehicleModal">
                    <i class="fa fa-plus"></i> Add Vehicle
                </button>
            </div>
        </div>

        @if($vehicle)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">License Number</th>
                    <th scope="col">Vehicle Type</th>
                    <th scope="col">Fuel Consumption</th>
                    <th scope="col">Service Schedule</th>
                    <th scope="col">Vehicle Usage History</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicle as $ve)
                <tr>
                    <th scope="row">{{ $ve->kendaraan_id }}</th>
                    <td>{{ $ve->plat_nomor }}</td>
                    <td>{{ $ve->jenis_kendaraan }}</td>
                    <td>{{ $ve->konsumsi_bbm }}</td>
                    <td>{{ $ve->jadwal_servis }}</td>
                    <td>{{ $ve->riwayat_pemakaian }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

<!-- Vehicle Modal -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVehicleModalLabel">Add Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.vehicle.store') }}">
                @csrf
                <div class="modal-body">
                    <!-- Driver form fields -->
                    <div class="form-group">
                        <label for="plat_nomor">License Number</label>
                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" required>
                    </div>
                    <div class="form-group">
                        <label>Vehicle Type</label>
                        <div class="custom-control custom-radio col-md-4">
                            <input type="radio" id="customRadio1" name="jenis_kendaraan" class="custom-control-input" value="Orang">
                            <label class="custom-control-label" for="customRadio1">Passenger Vehicle</label>
                        </div>
                        <div class="custom-control custom-radio col-md-4">
                            <input type="radio" id="customRadio2" name="jenis_kendaraan" class="custom-control-input" value="Barang">
                            <label class="custom-control-label" for="customRadio2">Cargo Vehicle</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="konsumsi_bbm">Fuel Consumption</label>
                        <input type="text" class="form-control" id="konsumsi_bbm" name="konsumsi_bbm" required>
                    </div>
                    <div class="form-group">
                        <label for="jadwal_servis">Service Schedule</label>
                        <input class="form-control date-picker" name="jadwal_servis" placeholder="Select Date" type="date">
                    </div>
                    <div class="form-group">
                        <label for="riwayat_pemakaian">Vehicle Usage History</label>
                        <input type="text" class="form-control" id="riwayat_pemakaian" name="riwayat_pemakaian" required>
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