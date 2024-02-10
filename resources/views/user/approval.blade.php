@extends('layouts.user')

@section('title', 'Booking List')

@section('content')
<div class="main-container">
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Booking History</h4>
            </div>
        </div>

        @if ($bookings)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Vehicle Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $bk)
                <tr>
                    <th scope="row">{{ $bk->booking_id}}</th>
                    <td>{{ $bk->nama }}</td>
                    <td>{{ $bk->jenis_kendaraan }}</td>
                    <td>{{ $bk->tanggal }}</td>
                    <td>
                        @if($booking->status == 'Diterima')
                        <span class="badge badge-success">{{ $bk->status }}</span>
                        @elseif($booking->status == 'Ditolak')
                        <span class="badge badge-danger">{{ $bk->status }}</span>
                        @else
                        <span class="badge badge-primary">{{ $bk->status }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No booking records found.</p>
        @endif
    </div>
</div>
@endsection