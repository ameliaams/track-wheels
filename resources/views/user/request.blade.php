@extends('layouts.user')

@section('title', 'Booking Request')

@section('content')
<div class="main-container">
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Booking Request List</h4>
            </div>
        </div>

        @if($bookings->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Vehicle Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $b)
                <tr>
                    <th scope="row">{{ $b->booking_id }}</th>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->jenis_kendaraan }}</td>
                    <td>{{ $b->tanggal }}</td>
                    <td>
                        @if($b->status == 'Diterima')
                        <span class="badge badge-success">{{ $b->status }}</span>
                        @elseif($b->status == 'Ditolak')
                        <span class="badge badge-danger">{{ $b->status }}</span>
                        @else
                        <span class="badge badge-primary">{{ $b->status }}</span>
                        @endif
                    </td>
                    <td><button class="btn btn-primary btn-sm" onclick="showDetailModal('{{ $b->nama }}', '{{ $b->jenis_kendaraan }}', '{{ $b->tanggal }}')"><i class="fa fa-search"></i> Detail</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Booking Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="booking_id" id="booking_id" value="{{ $b->booking_id }}">
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="detailName"></span></p>
                <p><strong>Vehicle Type:</strong> <span id="detailVehicleType"></span></p>
                <p><strong>Date:</strong> <span id="detailDate"></span></p>
            </div>
            <div class="modal-body">
                <label>Status</label>
                <div class="custom-control custom-radio col-md-4">
                    <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="Pending">
                    <label class="custom-control-label" for="customRadio1">Pending</label>
                </div>
                <div class="custom-control custom-radio col-md-4">
                    <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="Diterima">
                    <label class="custom-control-label" for="customRadio2">Diterima</label>
                </div>
                <div class="custom-control custom-radio col-md-4">
                    <input type="radio" id="customRadio3" name="status" class="custom-control-input" value="Ditolak">
                    <label class="custom-control-label" for="customRadio2">Ditolak</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showDetailModal(name, vehicleType, date) {
        // Isi detail data pada modal
        document.getElementById('detailName').innerText = name;
        document.getElementById('detailVehicleType').innerText = vehicleType;
        document.getElementById('detailDate').innerText = date;

        // Tampilkan modal
        $('#detailModal').modal('show');
    }

    // Wait for the document to load
    document.addEventListener('DOMContentLoaded', function() {
        var saveButton = document.querySelector('#detailModal .modal-footer .btn-success');

        saveButton.addEventListener('click', function() {
            var selectedStatus = document.querySelector('input[name="status"]:checked').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("user.updateStatus") }}');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Include CSRF token
            xhr.onload = function() {
                if (xhr.status === 200) {
                    $('#detailModal').modal('hide');
                    // Optionally, you can reload the page or update the UI
                }
            };

            var booking_id = document.querySelector('input[name="booking_id"]').value; // Get booking ID
            xhr.send(JSON.stringify({
                id: booking_id,
                status: selectedStatus
            }));
        });
    });
</script>
@endsection