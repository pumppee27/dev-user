@extends("layout.index")
@section('title', 'Kategori Titik Layanan')

@section('main')
<div class="card p-3">
    <div class="card-body">
      <div class="row">
        <h3 class="text-uppercase">Tambah Kategori pegawai</h3>
      </div>
      <hr>
      <form action="{{route('kategori-pegawai.store')}}" method="post">
        @csrf
      <div class="row">
          <div class="col-lg-6">
            {{-- kategori pegawai --}}
            <div class="mb-3">
              <label for="nama-uppd" class="form-label">Kategori Pegawai</label>
              <input type="text" name="kategori_pegawai" value="{{old('kategori_pegawai')}}" class="form-control" id="kategori_pegawai-uppd" autofocus>
              @error('kategori_pegawai')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>     
          </div>

        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
        <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Kembali</button>
      </form>
       
        
       
    </div>
</div>
@endsection

