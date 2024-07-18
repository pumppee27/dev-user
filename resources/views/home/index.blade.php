@extends("layout.index")
@section('title', 'Home')

@section('main')
<div class="card py-5 px-2">
    <div class="card-body">
        <h1>Selamat Datang di Modul Management User</h1>
    </div>
</div>

@include('sweetalert::alert')   
@endsection

