@extends("layout.index")
@section('title', 'Kategori Titik Layanan')

@section('main')
<div class="card p-3">
    <div class="card-body">
      <div class="row">
        <h3 class="text-uppercase">Ubah Kategori Titik Layanan</h3>
      </div>
      <hr>
      <form>
        @csrf
        @method('patch')
      <div class="row">
          <div class="col-lg-6">
            {{-- kategori titik layanan --}}
            <div class="mb-3">
              <label for="" class="form-label">Kategori Titik Layanan</label>
              <input type="text" name="nama_kategori_titik_layanan" value="{{$kategoriTitikLayanan->nama_kategori_titik_layanan}}" class="form-control" autofocus>
              @error('nama_kategori_titik_layanan')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>     
          </div>

        </div>
        <button class="btn btn-primary" id="btn-ubah-hak-akses">Ubah</button>
        <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Kembali</button>
      </form>
       
        
       
    </div>
</div>
@endsection

