@extends("layout.index")
@section('title', 'UPPD')

@section('main')
<div class="card p-3">
    <div class="card-body">
      <div class="row">
        <h3>TAMBAH MUTASI</h3>
      </div>
      <hr>
      <form action="/mutasi" method="post">
        @csrf
      
          <div class="col-lg-6">
            {{-- UPPD --}}
            <div class="mb-3">
              <label for="pilih-uppd-mutasi-pegawai" class="form-label">UPPD</label>
              <select class="form-select select2" name="uppd_id" id="pilih-uppd-mutasi-pegawai">
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

            {{-- Pegawai Mutasi --}}
            <div class="mb-3" id="pegawai-user-samsat">
              <div class="d-flex align-items-center">
                  <label for="" class="col-form-label">Pegawai</label>
                  <div class="spinner-border text-primary spinner-border-sm loading-select-pegawai-mutasi ms-2" role="status" style="display: none;">
                  </div>
                  
              </div>
              <select class="form-select form-control-sm select2" aria-label="Default select example" id="pilih-pegawai-mutasi" name="pegawai_id" disabled>
                  <option value="">Silahkan UPPD terlebih dahulu</option>
              </select>
              @error('pegawai_id')
                  <div class="text-danger fs-6 fst-italic">
                      {{$message}}
                  </div>
              @enderror
            </div>

            {{-- Jenis Mutasi --}}
            <div class="mb-3">
              <label for="select-uppd-pegawai" class="form-label">Jenis Mutasi</label>
              <select class="form-select select2" name="jenis_mutasi" id="jenis_mutasi">
                <option value="">Pilih Jenis Mutasi</option>
                <option value="1">UPPD Lain</option>
                <option value="2">SKPD Lain</option>
                
              </select>
              @error('uppd_id')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>
            
            {{-- UPPD --}}
            <div class="mb-3" id="tujuan_mutasi">
              <label for="pilih-uppd-mutasi-pegawai" class="form-label">UPPD Tujuan</label>
              <select class="form-select select2" name="uppd_tujuan" id="pilih-uppd-mutasi-pegawai">
                <option value="">Pilih UPPD Tujuan</option>
                @foreach ($uppd as $u)
                  <option value="{{$u->id}}">{{$u->nama_uppd}}</option>
                @endforeach
              </select>
            </div>
          </div>
        
        <button class="btn btn-primary" type="submit">Simpan</button>
        <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Kembali</button>
      </form>
       
        
       
    </div>
</div>
@endsection

