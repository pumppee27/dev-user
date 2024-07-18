@extends("layout.index")
@section('title', 'User Samsat')

@section('main')
<div class="card" style="min-height: 85vh; height> auto;">
    <div class="card-body" >
        <form action="/user_samsat/{{$user_samsat->id}}" method="POST">
            @csrf
            @method('patch')
            <span class="mb-3 h4">
                UBAH DATA USER SAMSAT
            </span>
            <hr>
            
            <div class="row">
                <div class="col-lg-6">
                    {{-- UPPD --}}
                    <div class="mb-3">
                        <label for="" class="col-form-label">UPPD</label>
                        <select class="form-select col-lg-6" aria-label="Default select example" id="pilih-uppd-user-samsat" name="uppd_id">
                            <option value="{{$user_samsat->uppd_id}}">{{$user_samsat->nama_uppd}}</option>
                        </select>
                        @error('uppd_id')
                            <div class="text-danger fs-6 fst-italic">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    {{-- Titik Layanan User Samsat --}}
                    <div class="mb-3" >
                        <div class="d-flex align-items-center">
                            <label for="" class="col-form-label">Titik Layanan</label>
                            <div class="spinner-border text-primary spinner-border-sm loading-select ms-2" role="status" style="display: none;">
                            </div>
                            
                        </div>
                        
                        <select class="form-select form-control-sm select2" aria-label="Default select example" id="ubah-titik-layanan-user-samsat" name="titik_layanan_id">
                            <option value="{{$user_samsat->titik_layanan_id}}">{{$user_samsat->nama_titik_layanan}}</option>
                            @foreach ($titikLayanan as $tl)
                            <option value="{{$tl->id}}">{{$tl->nama_titik_layanan}}</option>
                            @endforeach
                        </select>
                        @error('titik_layanan_id')
                            <div class="text-danger fs-6 fst-italic">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    {{-- Pegawai User Samsat --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <label for="" class="col-form-label">Pegawai</label>
                            <div class="spinner-border text-primary spinner-border-sm loading-select-pegawai ms-2" role="status" style="display: none;">
                            </div>
                            
                        </div>
                        <select class="form-select form-control-sm select2" aria-label="Default select example" id="ubah-pegawai-user-samsat" name="pegawai_id">
                            <option value="{{$user_samsat->pegawai_id}}">{{$user_samsat->nama_pegawai}}</option>
                            @foreach ($pegawai as $p)
                            <option value="{{$p->id}}">{{$p->nama_pegawai}}</option>
                            @endforeach
                        </select>
                        @error('pegawai_id')
                            <div class="text-danger fs-6 fst-italic">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    {{-- Nama Alias --}}
                    <div class="mb-3">
                        <label for="" class="col-form-label">Nama Alias</label>
                        <input type="text" class="form-control" name="nama_alias" value="{{$user_samsat->nama_alias}}">
                        
                        @error('nama_alias')
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
                                    <input type="password" class="form-control" name="password" aria-describedby="basic-addon1" id="password_input" placeholder="kosongkan bila tidak diganti">
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
                                    <input type="password" name="password_confirmation" class="form-control password-confirm" id="password_input_confirm">
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
                
                <div class="col-lg-6 overflow-y-scroll">
                    {{-- Hak Akses--}}
                    <div>
                        <div class="row">
                            <div class="col-6">
                                <span class="fw-semibold"   >
                                    Silahkan Pilih Hak Akses
                                </span>
                            </div>
                            <div class="col-6">
                                <div class="form-check" id="">
                                    <input class="form-check-input" type="checkbox" id="check_all">
                                    <label class="form-check-label fw-semibold" for="check_all" id="label_check_all">
                                    Pilih semua?  
                                    </label>
                                </div>
                            </div>
                        </div>
                        @php
                            $split = explode(',', $user_samsat->hak_akses_id)
                            
                        @endphp
                        
                                                   
                        @foreach ($hak_akses as $hk)
                        <div class="form-check text-capitalize">
                                <input class="form-check-input hak-akses" type="checkbox" name="hak_akses_id[]" id="{{$hk->hak_akses}}" value="{{$hk->id}}"  @foreach ($split as $s) @if($hk->id == $s) checked @endif @endforeach>
                                
                                <label class="form-check-label text-capitalize" for="{{$hk->hak_akses}}">
                                {{$hk->hak_akses}}
                                </label>
                            </div>
                            @php
                            
                            $sub_split = explode(',', $user_samsat->sub_hak_akses_id)
                        @endphp
                            @foreach ($sub_hak_akses as $shk)
                            @if($shk->hak_akses_id == $hk->id)
                                <div class="form-check ms-4 text-capitalize">
                                    <input class="form-check-input sub-hak-akses" type="checkbox" name="sub_hak_akses_id[]" id="{{$shk->sub_hak_akses}}" value="{{$shk->id}}" @foreach ($sub_split as $sb) @if($shk->id == $sb) checked @endif @endforeach>
                                    <label class="form-check-label text-capitalize" for="{{$shk->sub_hak_akses}}">
                                    {{$shk->sub_hak_akses}}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        @endforeach
                        
                        
                         
                    </div>
                    {{-- Akhir Hak Akses--}}
                </div>
            </div>
            <hr>
            <Button class="btn btn-primary">Ubah</Button>
            <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Kembali</button>
            </div>
        </form>
    </div>
</div>
@endsection

