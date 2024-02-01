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
        <form method="POST" action="{{ url('/booking') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" placeholder="Booking's Name">
            </div>
            <div class="form-group">
                <label>Vehicle Type</label>
                <div class="custom-control custom-radio col-md-4">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Passenger Vehicle</label>
                </div>
                <div class="custom-control custom-radio col-md-4">
                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Cargo Vehicle</label>
                </div>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input class="form-control date-picker" placeholder="Select Date" type="text">
            </div>
            <div class="form-group">
                <label>Driver</label>
                <select class="custom-select col-12">
                    <option selected="">Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label>Approval</label>
                        <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Check this custom checkbox</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3">Check this custom checkbox</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                            <label class="custom-control-label" for="customCheck4">Check this custom checkbox</label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="clearfix">
                <div class="pull-right">
                    <button type="submit">
                        <a class="btn btn-success btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button">Submit</a>
                    </button>
                    <a href="{{ asset('/admin') }}" class="btn btn-danger btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection