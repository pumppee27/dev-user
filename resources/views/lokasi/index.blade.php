@extends("layout.index")
@section('title', 'Lokasi')

@section('main')
<div class="card px-5 py-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
              DATA LOKASI
          </div>
          <div>
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" id="btn-modal-tambah-lokasi">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                  </svg>
                  Tambah
              </button>
          </div>
        </div>
        
        <div class="row mt-3">
            <table class="table table-bordered datatable table-responsive-sm table-sm table-striped shadow-sm" id="lokasi-table">
                <thead>
                    <tr class="">
                        <th scope="col" class="text-center">NO</th>
                        <th scope="col" class="text-center">LEVEL</th>
                        <th scope="col" class="text-center">UPPD</th>
                        <th scope="col" class="text-center">KODE LOKASI</th>
                        <th scope="col" class="text-center">LOKASI</th>
                        <th scope="col" class="text-center">AKSI</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
@include('lokasi.modal.tambah-lokasi')
@include('lokasi.modal.ubah-lokasi')
@include('lokasi.modal.detail-lokasi')
{{-- @include('lokasi.btn-action') --}}

{{-- @include('uppd.modal.detail-lokasi') --}}


@endsection

