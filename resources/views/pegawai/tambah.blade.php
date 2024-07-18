@extends("layout.index")
@section('title', 'Titik Layanan')

@section('main')
<div class="card p-3">
    <div class="card-body">
      <div class="row">
        <h3>TAMBAH PEGAWAI</h3>
      </div>
      <hr>
      <form action="{{route('pegawai.store')}}" method="post">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            {{-- UPPD --}}
            <div class="mb-3">
              <label for="select-uppd-pegawai" class="form-label">UPPD</label>
              <select class="form-select select2" name="uppd_id" id="pilih-uppd-pegawai">
                <option value="">Pilih UPPD</option>
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
            
            {{-- Kategori Pegawai --}}
            <div class="mb-3">
              <label for="" class="form-label">Kategori Pegawai</label>
              <select class="form-select select2" name="kategori_pegawai_id">
                <option value="">Pilih Kategori Pegawai</option>
                @foreach ($kategoriPegawai as $kp)
                  <option value="{{$kp->id}}">{{$kp->kategori_pegawai}}</option>
                @endforeach
              </select>
              @error('kategori_pegawai_id')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div> 

                 
          </div>
          <div class="col-lg-6">
            {{-- Nama Pegawai --}}
            <div class="mb-3">
              <label class="form-label">Nama Pegawai</label>
              <input type="text" name="nama_pegawai" value="{{old('nama_pegawai')}}" class="form-control">
              @error('nama_pegawai')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>


            {{-- NIP Pegawai --}}
            <div class="mb-3">
              <label for="nip" class="form-label">NIP / NRP</label>
              <input type="text" name="nip" value="{{old('nip')}}" class="form-control">
              @error('nip')
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
