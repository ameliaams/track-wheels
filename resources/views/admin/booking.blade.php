@extends('layouts.admin')

@section('title', 'Booking')

@section('content')
<div class="main-container">
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Booking Details</h4>
            </div>
        </div>
        <form method="POST" action="{{ route('submit') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="nama" placeholder="Booking's Name">
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
                <label>Date</label>
                <input class="form-control date-picker" name="tanggal" placeholder="Select Date" type="text">
            </div>
            <div class="form-group">
                <label>Driver</label>
                <select class="custom-select col-12" name="sopir">
                    <option selected="">Choose...</option>
                    @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label>Approval</label>
                        <!-- Add name attributes to your checkboxes -->
                        <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="persetujuan[]">
                            <label class="custom-control-label" for="customCheck1">Supervisor 1</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="persetujuan[]">
                            <label class="custom-control-label" for="customCheck2">Supervisor 2</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="persetujuan[]">
                            <label class="custom-control-label" for="customCheck3">Supervisor 3</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="persetujuan[]">
                            <label class="custom-control-label" for="customCheck4">Supervisor 4</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="pull-right">
                    <button type="submit" class="btn btn-success btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button">Submit</button>
                    <a href="{{ asset('/admin') }}" class="btn btn-danger btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection