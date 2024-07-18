@extends("layout.index")
@section('title', 'User Samsat')

@section('main')
<div class="card p-3">
    <div class="card-body">
        <div class="d-flex justify-content-between h4">
            <div>
                HISTORY USER SAMSAT
            </div>
        </div>
       
        <div class="row mt-3">
            <table class="table table-bordered datatable table-responsive-sm table-sm table-striped shadow-sm" id="histori-user-samsat-table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Titik Layanan</th>
                        <th scope="col" class="text-center">UPPD</th>
                    </tr>
                </thead>
               
            </table>
        </div>
    </div>
</div>
@include('sweetalert::alert') 
@endsection

