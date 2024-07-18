@extends("layout.index")
@section('title', 'Pengguna')

@section('main')
<div class="card p-3">
    <div class="card-body">
      <div class="row">
        <h3 class="text-uppercase">Tambah Pengguna</h3>
      </div>
      <hr>
      <form action="{{route('pengguna.store')}}" method="post">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3" >             
              <label for="" class="col-form-label">Level</label>
              <select class="form-select col-lg-6 select2" aria-label="Default select example" name="level_id">
                  <option value="">-- Pilih Level --</option>
                  @foreach ($level as $l)
                      <option value="{{$l->id}}">{{$l->level}}</option>
                  @endforeach
              </select>
              @error('uppd_id')
                  <div class="text-danger fs-6 fst-italic">
                      {{$message}}
                  </div>
              @enderror
          </div>
            
            
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="name" value="{{old('name')}}" class="form-control" autofocus>
              @error('name')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>

            {{-- Username --}}
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" value="{{old('username')}}" class="form-control">
              @error('username')
                <div class="text-danger fs-6 fst-italic">
                  {{$message}}
                </div>
              @enderror
            </div>

            <div class="row">

              <div class="col-lg-6">
                {{-- Password --}}
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password_input" value="{{old('password')}}">
                    <span class="input-group-text" id="basic-addon1"  id="toggle_password_input" onclick="toggle_password()">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye d-block" id="bi-eye-password" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash d-none" viewBox="0 0 16 16" id="bi-eye-slash-password">
                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                        <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                      </svg>
                    </span>
                  </div>
                  @error('password')
                    <div class="text-danger fs-6 fst-italic">
                      {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
  
              <div class="col-lg-6">
                {{-- Confirm Password --}}
                <div class="mb-3">
                  <label for="confirm_password" class="form-label">Konfirmasi password</label>
                  <div class="input-group">
                    <input type="password" name="password_confirmation" class="form-control password-confirm" id="password_input_confirm" value="{{old('password_confirmation')}}">
                    <span class="input-group-text" id="basic-addon1"  id="toggle_password_input_confirm" onclick="toggle_password_confirm()">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye d-block" id="bi-eye-password-confirm" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash d-none" viewBox="0 0 16 16" id="bi-eye-slash-password-confirm">
                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                        <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                      </svg>
                    </span>
                  </div>
                  @error('password_confirmation')
                    <div class="text-danger fs-6 fst-italic">
                      {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
            </div>


            
          </div>
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
        <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Kembali</button>
      </form>
       
        
       
    </div>
</div>
@endsection
