@extends('layouts.admin')

@section('title', 'Vehicle List')

@section('content')
<div class="main-container">
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Vehicle List</h4>
            </div>
        </div>
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td><span class="badge badge-primary">Primary</span></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>
                    <td><span class="badge badge-secondary">Secondary</span></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>@mdo</td>
                    <td><span class="badge badge-success">Success</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection