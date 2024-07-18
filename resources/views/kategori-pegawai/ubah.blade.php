@extends("layout.index")
@section('title', 'Kategori Pegawai')

@section('main')
<div class="card p-3">
    <div class="card-body">
      <div class="row">
        <h3>UBAH KATEGORI PEGAWAI</h3>
      </div>
      <hr>
      <form action="/kategori_pegawai/{{$kategoriPegawai->id}}" method="post">
        @csrf
        @method('patch')
      <div class="row">
          <div class="col-lg-6">
            {{-- kategori Pegawai --}}
            <div class="mb-3">
              <label for="nama-uppd" class="form-label">Kategori Pegawai</label>
              <input type="text" name="kategori_pegawai" value="{{$kategoriPegawai->kategori_pegawai}}" class="form-control" autofocus>
              @error('kategori_pegawai')
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

