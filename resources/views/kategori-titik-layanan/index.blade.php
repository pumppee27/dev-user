@extends("layout.index")
@section('title', 'UPPD')

@section('main')
<div class="card p-3">
    <div class="card-body">
        <div class="d-flex justify-content-between h3">
            <div>
                KATEGORI TITIK LAYANAN
            </div>
            <div>
                <a href="{{route('kategori-titik-layanan.tambah')}}" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                    Tambah
                </a>
            </div>
        </div>
        
        <div class="row mt-3">
            <table class="table table-bordered datatable table-responsive-sm table-sm table-striped shadow-sm" id="kategori-titik-layanan-table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">NO</th>
                        <th scope="col" class="text-center">KATEGORI TITIK LAYANAN</th>
                        <th scope="col" class="text-center">AKSI</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
@include('kategori-titik-layanan.modal.detail-kategori-titik-layanan')
@include('sweetalert::alert')   
@endsection

