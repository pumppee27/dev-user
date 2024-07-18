@extends("layout.index")
@section('title', 'Pejabat')

@section('main')
<div class="card p-3">
    <div class="card-body">
      <div class="row">
        <h3>TAMBAH PEJABAT</h3>
      </div>
      <hr>
      <form action="/pejabat" method="post">
        @csrf
        <div class="row">
          <div class="col-lg-6">

            {{-- Pilih UPPD --}}
            <div class="mb-3">
              {{-- UPPD --}}
              <label for="" class="col-form-label">UPPD</label>
              <select class="form-select col-lg-6 select2" aria-label="Default select example" id="pilih-uppd-user-samsat" name="uppd_id">
                  <option value="">-- Pilih UPPD --</option>
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

            {{-- Kepala UPPD --}}
            <div class="mb-3">
              <label for="kepala-uppd" class="form-label">Kepala UPPD</label>
              <input type="text" name="ka_uppd" value="{{old('ka_uppd')}}" class="form-control" id="kepala-uppd" autofocus>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="plt_ka_uppd" value="1" id="plt-kepala-uppd">
                <label class="form-check-label fst-italic text-secondary" for="plt-kepala-uppd">
                  Plt Kepala UPPD
                </label>
              </div>
              @error('ka_uppd')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>

            {{-- NIP Kepala UPPD --}}
            <div class="mb-3">
              <label for="kepala-uppd" class="form-label">NIP Kepala UPPD</label>
              <input type="number" name="nip_ka_uppd" value="{{old('nip_ka_uppd')}}" class="form-control" id="nip-kepala-uppd">
              @error('nip_ka_uppd')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>
            
          </div>



          <div class="col-lg-6">
            {{-- Kasi PKB --}}
            <div class="mb-3">
              <label for="kasi-pkb" class="form-label">Kasi PKB</label>
              <input type="text" name="kasi_pkb" value="{{old('kasi_pkb')}}" class="form-control" id="kasi-pkb" autofocus>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="plt_kasi_pkb" value="1" id="plt-kasi-pkb"">
                <label class="form-check-label fst-italic text-secondary" for="plt-kasi-pkb">
                  Plt Kasi PKB
                </label>
              </div>
              @error('kasi_pkb')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="nip-kasi-pkb" class="form-label">NIP Kasi PKB</label>
              <input type="number" name="nip_kasi_pkb" value="{{old('nip_kasi_pkb')}}" class="form-control" id="nip-kasi-pkb" autofocus>
              @error('nip_kasi_pkb')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>


            {{-- Bend. Penerimaan --}}
            <div class="mb-3">
              <label for="bend-penerimaan" class="form-label">Bendahara Penerimaan</label>
              <input type="text" name="bend_penerimaan" value="{{old('bend_penerimaan')}}" class="form-control" id="bend-penerimaan" autofocus>
              @error('bend_penerimaan')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="nip-bend-penerimaan" class="form-label">NIP Bendahara Penerimaan</label>
              <input type="number" name="nip_bend_penerimaan" value="{{old('nip_bend_penerimaan')}}" class="form-control" id="nip-bend-penerimaan" autofocus>
  
              @error('nip_bend_penerimaan')
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

