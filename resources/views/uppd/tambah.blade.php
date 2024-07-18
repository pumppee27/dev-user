@extends("layout.index")
@section('title', 'UPPD')

@section('main')
<div class="card p-3">
    <div class="card-body">
      <div class="row">
        <h3>TAMBAH UPPD</h3>
      </div>
      <hr>
      <form action="/uppd" method="post">
        @csrf
      <div class="row">
          <div class="col-lg-6">
            {{-- Nama UPPD --}}
            <div class="mb-3">
              <label for="nama-uppd" class="form-label">Nama UPPD</label>
              <input type="text" name="nama_uppd" value="{{old('nama_uppd')}}" class="form-control" id="nama-uppd" autofocus>
              @error('nama_uppd')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>


            {{-- Alamat UPPD --}}
            <div class="mb-3">
              <label for="alamat-uppd" class="form-label">Alamat UPPD</label>
              <textarea class="form-control" id="alamat-uppd" rows="2" name="alamat">{{old('alamat')}}</textarea>
             
              @error('alamat')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>


            {{-- Mapping Nopol --}}
            <div class="mb-3">
              <label for="maping-nopol" class="form-label">Mapping Nopol</label>
              <input type="text" name="mapping_nopol" value="{{old('mapping_nopol')}}" class="form-control" id="maping-nopol">
              @error('mapping_nopol')
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

