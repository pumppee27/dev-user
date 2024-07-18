@extends("layout.index")
@section('title', 'User Samsat')

@section('main')
<div class="card" style="min-height: 85vh; height> auto;">
    <div class="card-body" >
        <form action="{{route('user-samsat.store')}}" method="POST">
            @csrf
            <span class="fw-semibold mb-3">
                TAMBAH DATA PENGGUNA SAMSAT
            </span>
            <hr>
            <div class="row">
                <div class="col-lg-6">

                    <div class="mb-3" id="uppd-user-samsat">
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

                    {{-- Titik Layanan User Samsat --}}
                    <div class="mb-3" id="titik-layanan-user-samsat">
                        <div class="d-flex align-items-center">
                            <label for="" class="col-form-label">Titik Layanan</label>
                            <div class="spinner-border text-primary spinner-border-sm loading-select ms-2" role="status" style="display: none;">
                            </div>
                            
                        </div>
                        
                        <select class="form-select form-control-sm select2" id="pilih-titik-layanan-user-samsat" name="titik_layanan_id" disabled>
                            <option value="">Silahkan Pilih UPPD terlebih dahulu</option>
                        </select>
                        @error('titik_layanan_id')
                            <div class="text-danger fs-6 fst-italic">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    {{-- Pegawai User Samsat --}}
                    <div class="mb-3" id="pegawai-user-samsat">
                        <div class="d-flex align-items-center">
                            <label for="" class="col-form-label">Pegawai</label>
                            <div class="spinner-border text-primary spinner-border-sm loading-select-pegawai ms-2" role="status" style="display: none;">
                            </div>
                            
                        </div>
                        <select class="form-select form-control-sm select2" aria-label="Default select example" id="pilih-pegawai-user-samsat" name="pegawai_id" disabled>
                            <option value="">Silahkan Pilih Titik Layanan terlebih dahulu</option>
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
                        <input type="text" class="form-control" name="nama_alias" value="{{old('nama_alias')}}">
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
                                    <input type="password" class="form-control" name="password" aria-describedby="basic-addon1" id="password_input">
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
                
                {{-- <div class="row">
                    <span class="fw-semibold mb-3">
                    DATA LOGIN / AKSES APLIKASI
                    </span>
                    <div class="mb-3 row">
                        <label for="user-login" class="col-sm-3 col-form-label ms-2">User Login</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user-login" name="user_login">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label ms-2">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="confirm-password" class="col-sm-3 col-form-label ms-2 col-form-label-sm">Ulangi Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="confirm-password" name="confirm_password">
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-6 overflow-y-scroll">
                    {{-- Hak Akses--}}
                    {{-- <div>
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
                        <div class="row">
                            <div>
                                <div id="hak_akses_pengaturan"  >
                                    <input class="form-check-input" type="checkbox" id="pengaturan" >
                                    <label class="form-check-label " for="Pengaturan">
                                        Pengaturan  
                                    </label>
                                    <div class="ms-4" id="hak_akses_utilities">
                                        <input class="form-check-input" type="checkbox" value="1" id="utilities" name="utilities">
                                        <label class="form-check-label" for="utilities">
                                            Utilities  
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_tabel">
                                        <input class="form-check-input" type="checkbox" value="" id="tabel">
                                        <label class="form-check-label" for="tabel">
                                            Tabel  
                                        </label>
                                        <div class="ms-4" id="hak_akses_jenis_layanan">
                                            <input class="form-check-input" type="checkbox" value="1" id="jenis_layanan" name="jenis_layanan">
                                            <label class="form-check-label" for="jenis_layanan">
                                                Jenis Layanan  
                                            </label>
                                        </div>
                                        <div class="ms-4" id="hak_akses_manajemen_user">
                                            <input class="form-check-input" type="checkbox" value="1" id="manajemen_user" name="manajemen_user">
                                            <label class="form-check-label" for="manajemen_user">
                                                Manajemen User  
                                            </label>
                                        </div>
                                        <div class="ms-4" id="hak_akses_klasifikasi_golongan">
                                            <input class="form-check-input" type="checkbox" value="1" id="klasifikasi_golongan" name="klasifikasi_golongan">
                                            <label class="form-check-label" for="klasifikasi_golongan">
                                                Klasifikasi Golongan  
                                            </label>
                                        </div>
                                        <div class="ms-4" id="hak_akses_jasa_raharja">
                                            <label class="form-check-label">
                                                Jasa Raharja  
                                            </label>
                                        </div>
                                        <div class="ms-4" id="hak_akses_tanda_tangan_jr">
                                            <input class="form-check-input" type="checkbox" value="1" id="tanda_tangan_jr" name="tanda_tangan_jr">
                                            <label class="form-check-label" for="tanda_tangan_jr">
                                                Tanda Tangan  
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="hak_akses_manajemen"   >
                                    <input class="form-check-input" type="checkbox" value="1" id="manajemen" name="manajemen">
                                    <label class="form-check-label" for="manajemen">
                                        Manajemen  
                                    </label>
                                </div>
                                <div id="hak_akses_formulir_spopd"  >
                                    <input class="form-check-input" type="checkbox" value="1" id="formulir_spopd" name="formulir_spopd">
                                    <label class="form-check-label" for="formulir_spopd">
                                        Formulir / SPOPD  
                                    </label>
                                </div>
                                <div id="hak_akses_verval"  >
                                    <input class="form-check-input" type="checkbox" value="1" id="verval" name="verval">
                                    <label class="form-check-label" for="verval">
                                        Verifikasi & Validasi  
                                    </label>
                                </div>
                                <div id="hak_akses_perbaikan_data_verifikasi"   >
                                    <input class="form-check-input" type="checkbox" value="1" id="perbaikan_data_verifikasi" name="perbaikan_data_verifikasi">
                                    <label class="form-check-label" for="perbaikan_data_verifikasi">
                                        Perbaikan Data Verifikasi  
                                    </label>
                                </div>
                                <div id="hak_akses_verifikasi_jr"   >
                                    <input class="form-check-input" type="checkbox" value="1" id="verifikasi_jr" name="verifikasi_jr">
                                    <label class="form-check-label" for="verifikasi_jr">
                                        Verifikasi Jasa Raharja  
                                    </label>
                                </div>
                                <div id="hak_akses_penetapan"   >
                                    <input class="form-check-input" type="checkbox" id="penetapan">
                                    <label class="form-check-label" for="penetapan">
                                        Penetapan  
                                    </label>
                                    <div class="ms-4" id="hak_akses_penetapan_pajak">
                                        <input class="form-check-input" type="checkbox" value="1" id="penetapan_pajak" name="penetapan_pajak">
                                        <label class="form-check-label" for="penetapan_pajak">
                                            Penetapan Pajak
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_penetapan_tambahan_pajak">
                                        <input class="form-check-input" type="checkbox" value="1" id="penetapan_tambahan_pajak" name="penetapan_tambahan_pajak">
                                        <label class="form-check-label" for="penetapan_tambahan_pajak">
                                            Penetapan Tambahan Pajak
                                        </label>
                                    </div>
                                </div>
                                <div id="hak_akses_laporan"     >
                                    <input class="form-check-input" type="checkbox" id="laporan">
                                    <label class="form-check-label" for="laporan">
                                        Laporan  
                                    </label>
                                    <div class="ms-4" id="hak_akses_pengeluaran_spopd">
                                        <input class="form-check-input" type="checkbox" value="1" id="pengeluaran_spopd" name="pengeluaran_spopd">
                                        <label class="form-check-label" for="pengeluaran_spopd">
                                            Pengeluaran SPOPD  
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_perubahan_data">
                                        <input class="form-check-input" type="checkbox" value="1" id="perubahan_data" name="perubahan_data">
                                        <label class="form-check-label" for="perubahan_data">
                                            Perubahan Data  
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_perubahan_biaya">
                                        <input class="form-check-input" type="checkbox" value="1" id="perubahan_biaya" name="perubahan_biaya">
                                        <label class="form-check-label" for="perubahan_biaya">
                                            Perubahan Biaya  
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_laporan_harian">
                                        <input class="form-check-input" type="checkbox" value="1" id="laporan_harian" name="laporan_harian">
                                        <label class="form-check-label" for="laporan_harian">
                                            Laporan Harian  
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_laporan_bulanan">
                                        <input class="form-check-input" type="checkbox" value="1" id="laporan_bulanan" name="laporan_bulanan">
                                        <label class="form-check-label" for="laporan_bulanan">
                                            Laporan Bulanan  
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_laporan_pd">
                                        <input class="form-check-input" type="checkbox" value="1" id="laporan_pd" name="laporan_pd">
                                        <label class="form-check-label" for="laporan_pd">
                                            Laporan PD  
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_laporan_online">
                                        <input class="form-check-input" type="checkbox" value="1" id="laporan_online" name="laporan_online">
                                        <label class="form-check-label" for="laporan_online">
                                            Laporan Online  
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_laporan_pembebasan">
                                        <input class="form-check-input" type="checkbox" value="1" id="laporan_pembebasan" name="laporan_pembebasan">
                                        <label class="form-check-label" for="laporan_pembebasan">
                                            Laporan Pembebasan  
                                        </label>
                                    </div>
                                </div>
                                <div id="hak_akses_form_khusus"     >
                                    <input class="form-check-input" type="checkbox" value="1" id="form_khusus" name="form_khusus">
                                    <label class="form-check-label" for="form_khusus">
                                        Form Khusus  
                                    </label>
                                </div>
                                <div id="hak_akses_form_fiskal"     >
                                    <input class="form-check-input" type="checkbox" value="1" id="form_fiskal" name="form_fiskal">
                                    <label class="form-check-label" for="form_fiskal">
                                        Form Fiskal  
                                    </label>
                                </div>
                                <div id="hak_akses_blokir_kendaraan"    >
                                    <input class="form-check-input" type="checkbox" value="1" id="blokir_kendaraan" name="blokir_kendaraan">
                                    <label class="form-check-label" for="blokir_kendaraan">
                                        Blokir Kendaraan  
                                    </label>
                                </div>
                                <div id="hak_akses_informasi_kendaraan"     >
                                    <input class="form-check-input" type="checkbox" value="1" id="informasi_kendaraan" name="informasi_kendaraan">
                                    <label class="form-check-label" for="informasi_kendaraan">
                                        Informasi Kendaraan  
                                    </label>
                                </div>
                                <div id="hak_akses_admin_progresif"     >
                                    <input class="form-check-input" type="checkbox" value="1" id="admin_progresif" name="admin_progresif">
                                    <label class="form-check-label" for="admin_progresif">
                                        Admin Progresif  
                                    </label>
                                </div>
                                <div id="hak_akses_split_jr"    >
                                    <input class="form-check-input" type="checkbox" value="1" id="split_jr" name="split_jr">
                                    <label class="form-check-label" for="split_jr">
                                        Split Jasa Raharja  
                                    </label>
                                </div>
                                <div id="hak_akses_status_transaksi"    >
                                    <input class="form-check-input" type="checkbox" value="1" id="status_transaksi" name="status_transaksi">
                                    <label class="form-check-label" for="status_transaksi">
                                        Status Transaksi 
                                    </label>
                                </div>
                                <div id="hak_akses_perbaikan_data_sjo"  >
                                    <input class="form-check-input" type="checkbox" value="1" id="perbaikan_data_sjo" name="perbaikan_data_sjo">
                                    <label class="form-check-label" for="perbaikan_data_sjo">
                                        Perbaikan Data SJO 
                                    </label>
                                </div>
                                <div id="hak_akses_hapus_transaksi_kepala_uppd"     >
                                    <input class="form-check-input" type="checkbox" value="1" id="hapus_transaksi_kepala_uppd" name="hapus_transaksi_kepala_uppd">
                                    <label class="form-check-label" for="hapus_transaksi_kepala_uppd">
                                        Hapus Transaksi Kepala UPPD
                                    </label>
                                </div>
                                <div id="hak_akses_keringanan"  >
                                    <input class="form-check-input" type="checkbox" id="keringanan">
                                    <label class="form-check-label" for="keringanan">
                                        Keringanan
                                    </label>
                                    <div class="ms-4" id="hak_akses_permohonan_keringanan">
                                        <input class="form-check-input" type="checkbox" value="1" id="permohonan_keringanan" name="permohonan_keringanan">
                                        <label class="form-check-label" for="permohonan_keringanan">
                                            Permohonan Keringanan
                                        </label>
                                    </div>
                                    <div class="ms-4" id="hak_akses_pembayaran_keringanan">
                                        <input class="form-check-input" type="checkbox" value="1" id="pembayaran_keringanan" name="pembayaran_keringanan">
                                        <label class="form-check-label" for="pembayaran_keringanan">
                                            Pembayaran Keringanan
                                        </label>
                                    </div>
                                </div>                               
                            </div>

                            <div id="hak_akses_manajemen_menu"  >
                                <input class="form-check-input" type="checkbox" value="1" id="manajemen_menu" name="manajemen_menu">
                                <label class="form-check-label" for="manajemen_menu">
                                    Manajemen Menu
                                </label>
                            </div>

                            <div id="hak_akses_perbaikan_data_verifikasi_valbin">
                                <input class="form-check-input" type="checkbox" value="1" id="perbaikan_data_verifikasi_valbin" name="perbaikan_data_verifikasi_valbin">
                                <label class="form-check-label" for="perbaikan_data_verifikasi">
                                    Perbaikan Data Verifikasi (Valbin)
                                </label>
                            </div>
                        </div>      
                    </div> --}}
                    {{-- Akhir Hak Akses--}}

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
                    @foreach ($hak_akses as $hk)
                        <div class="form-check text-capitalize">
                            <input class="form-check-input hak-akses" type="checkbox" name="hak_akses_id[]" id="{{$hk->hak_akses}}" value="{{$hk->id}}">
                            <label class="form-check-label text-capitalize" for="{{$hk->hak_akses}}">
                              {{$hk->hak_akses}}
                            </label>
                        </div>
                        @foreach ($sub_hak_akses as $shk)
                            @if($shk->hak_akses_id == $hk->id)
                                <div class="form-check ms-4 text-capitalize">
                                    <input class="form-check-input sub-hak-akses" type="checkbox" name="sub_hak_akses_id[]" id="{{$shk->hak_akses_id}}" value="{{$shk->id}}" >
                                    <label class="form-check-label text-capitalize" for="{{$shk->sub_hak_akses}}">
                                    {{$shk->sub_hak_akses}}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                    
                        
                        
                </div>
            </div>
            <hr>
            <Button class="btn btn-primary" type="submit">Simpan</Button>
            <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Kembali</button>
            </div>
        </form>
    </div>
</div>
@endsection

