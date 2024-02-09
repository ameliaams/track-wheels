@extends('layouts.admin')

@section('title', 'Booking List')

@section('content')
<div class="main-container">
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Booking History</h4>
            </div>
        </div>

        @if ($bookings->isNotEmpty())
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
                @foreach($bookings as $book)
                <tr>
                    <th scope="row">{{ $book->booking_id}}</th>
                    <td>{{ $book->nama }}</td>
                    <td>{{ $book->jenis_kendaraan }}</td>
                    <td>{{ $book->tanggal }}</td>
                    <td>
                        @if($book->status == 'Diterima')
                        <span class="badge badge-success">{{ $book->status }}</span>
                        @elseif($book->status == 'Ditolak')
                        <span class="badge badge-danger">{{ $book->status }}</span>
                        @else
                        <span class="badge badge-primary">{{ $book->status }}</span>
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