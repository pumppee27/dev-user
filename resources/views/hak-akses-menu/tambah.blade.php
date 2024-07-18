@extends("layout.index")
@section('title', 'Hak Akses Menu')

@section('main')
<div class="card">
    <div class="card-body">
      <div class="row py-3">
        <h3>Tambah Hak Akses Menu</h3>
      </div>
      <hr>
      <form action="{{route('hak-akses-menu.store')}}" method="post">
        @csrf
      <div class="row">
          <div class="col-lg-6">
            {{-- Hak Akses Menu --}}
            <div class="mb-3">
              <label for="nama-uppd" class="form-label">Hak Akses Menu</label>
              <input type="text" name="hak_akses_menu" value="{{old('hak_akses_menu')}}" class="form-control" id="hak_akses_menu" autofocus>
              @error('hak_akses_menu')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>     
          </div>

        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </form>
       
        
       
    </div>
</div>
@endsection

