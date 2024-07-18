@extends("layout.index")
@section('title', 'Kategori Titik Layanan')

@section('main')
<div class="card">
    <div class="card-body">
      <div class="row py-3">
        <h3>Ubah Hak Akses Menu</h3>
      </div>
      <hr>
      <form action="/hak_akses_menu/{{$hakAksesMenu->id}}" method="post">
        @csrf
        @method('patch')
      <div class="row">
          <div class="col-lg-6">
            {{-- Hak Akses Menu --}}
            <div class="mb-3">
              <label for="nama-uppd" class="form-label">Hak Akses Menu</label>
              <input type="text" name="hak_akses_menu" value="{{$hakAksesMenu->hak_akses_menu}}" class="form-control" autofocus>
              @error('hak_akses_menu')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>     
          </div>

        </div>
        <button class="btn btn-primary" type="submit">Ubah</button>
        <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Kembali</button>
      </form>
       
        
       
    </div>
</div>
@endsection

