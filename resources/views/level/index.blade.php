@extends("layout.index")
@section('title', 'Level')

@section('main')
<div class="card px-5 py-3">
        <div class="card-body">
            
            
            <div id="alert-success">                
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>	
                </div>
                @endif
            

        <div class="d-flex justify-content-between">
            <div>
                DATA LEVEL
            </div>
            <div>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" id="btn-open-modal-level">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                    Tambah
                </button>
            </div>
        </div>
        <hr>
        <div class="row mt-2">
            <table class="table table-bordered table-striped table-sm datatable" id="level-table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center mx-0">NO</th>
                        <th scope="col" class="text-center">LEVEL</th>
                        <th scope="col" class="text-center">AKSI</th>
                    </tr>
                </thead>
            </table>
        </div>
        
    </div>
</div>

@include('level.modal.ubah-level')
@include('level.modal.tambah-level')
@include('level.modal.detail-level')
@endsection


