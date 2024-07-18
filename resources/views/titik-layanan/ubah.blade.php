@extends("layout.index")
@section('title', 'Titik Layanan')

@section('main')
<div class="card p-3">
    <div class="card-body">
      <div class="row">
        <h3 class="text-uppercase">Ubah Titik Layanan</h3>
      </div>
      <hr>
      <form action="/titik_layanan/k{{$titikLayanan->lokasi_id}}" method="post">
        @csrf
        @method('patch')
      <div class="row">
          <div class="col-lg-6">
            {{-- UPPD --}}
            <div class="mb-3">
              <label for="nama-uppd-titik-layanan" class="form-label">UPPD</label>
              <select class="form-select select2" name="uppd_id">
                <option value="{{$titikLayanan->uppd_id}}">{{$titikLayanan->nama_uppd}}</option>
                @foreach ($uppd as $u)
                  <option value="{{$u->id}}">{{$u->nama_uppd}}</option>
                @endforeach
              </select>
              @error('uppd_id')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div> 
            
            {{-- Kategori Titik Layanan --}}
            <div class="mb-3">
              <label for="nama-kategori-titik-layanan" class="form-label">Kategori Titik Layanan</label>
              <select class="form-select select2" name="kategori_titik_layanan_id">
                <option value="{{$titikLayanan->kategori_titik_layanan_id}}">{{$titikLayanan->kategori_titik_layanan}}</option>
                @foreach ($kategoriTitikLayanan as $k)
                  <option value="{{$k->id}}">{{$k->kategori_titik_layanan}}</option>
                @endforeach
              </select>
              @error('uppd_id')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>

            {{-- Lokasi Id --}}
            <div class="mb-3">
              <label for="lokasi-id" class="form-label">Lokasi Id</label>
              <input type="number" name="lokasi_id" value="{{$titikLayanan->lokasi_id}}" class="form-control">
              @error('lokasi_id')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>

            {{-- Nama Titik Layanan --}}
            <div class="mb-3">
              <label for="nama-titik-layanan" class="form-label">Nama Titik Layanan</label>
              <input type="text" name="nama_titik_layanan" value="{{$titikLayanan->nama_titik_layanan}}" class="form-control">
              @error('nama_titik_layanan')
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

