
<!-- Modal Tambah User -->
<div class="modal" id="modal-tambah-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl overflow-auto" >
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Tambah Data User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-6">
                  <div class="row">
                      <span class="fw-semibold mb-3">
                          DATA UPPD
                      </span>
                      <form id="form-tambah-user">
                          @csrf
                      <div class="mb-3 row">
                          <label for="level-user" class="col-sm-3 col-form-label ms-2 ">Level User</label>
                          <div class="col-sm-8">
                              <select class="form-select form-control-sm" aria-label="Default select example" id="level-tambah-user" name="level_user">
                                  <option></option>
                                  <option value="1">Admin BAPENDA</option>
                                  <option value="2">Kepala UPPD</option>
                                  <option value="3">SPOPD</option>
                                  <option value="4">Validasi dan Verifikasi</option>
                                  <option value="5">Admin UPPD</option>
                                  <option value="6">Admin Jasa Raharja</option>
                                  <option value="7">Verifikasi Jasa Raharja</option>
                                  <option value="8">Fiskal</option>
                                  <option value="9">Samsat Keliling</option>
                                  <option value="10">Samsat Gerai</option>
                                </select>
                                  @error('level_user')
                                      <div class="text-danger fs-6 fst-italic">
                                          {{$message}}
                                      </div>
                                  @enderror
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label for="uppd-user" class="col-sm-3 col-form-label ms-2">Nama User</label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control" id="nama-tambah-user" name="nama_user">
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label for="uppd-user" class="col-sm-3 col-form-label ms-2">UPPD</label>
                          <div class="col-sm-8">
                              <select class="form-select select" aria-label="Default select example" id="uppd-user" name="uppd_id">
                                  <option value="">Pilih UPPD</option>
                                </select>
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label for="lokasi-user" class="col-sm-3 col-form-label ms-2">Lokasi</label>
                          <div class="col-sm-8">
                              <select class="form-select" aria-label="Default select example" id="lokasi-user" name="lokasi_id">
                                  <option value="">Open this select menu</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
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
                  </div>
              </div>
              <div class="col-6" >
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
                                  <input class="form-check-input" type="checkbox"  id="check_all">
                                  <label class="form-check-label fw-semibold" for="check_all">
                                  Pilih semua?  
                                  </label>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div>
                              <div id="hak_akses_pengaturan" style="display: none">
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
                              <div id="hak_akses_manajemen" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="manajemen" name="manajemen">
                                  <label class="form-check-label" for="manajemen">
                                      Manajemen  
                                  </label>
                              </div>
                              <div id="hak_akses_formulir_spopd" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="formulir_spopd" name="formulir_spopd">
                                  <label class="form-check-label" for="formulir_spopd">
                                      Formulir / SPOPD  
                                  </label>
                              </div>
                              <div id="hak_akses_verval" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="verval" name="verval">
                                  <label class="form-check-label" for="verval">
                                      Verifikasi & Validasi  
                                  </label>
                              </div>
                              <div id="hak_akses_perbaikan_data_verifikasi" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="perbaikan_data_verifikasi" name="perbaikan_data_verifikasi">
                                  <label class="form-check-label" for="perbaikan_data_verifikasi">
                                      Perbaikan Data Verifikasi  
                                  </label>
                              </div>
                              <div id="hak_akses_verifikasi_jr" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="verifikasi_jr" name="verifikasi_jr">
                                  <label class="form-check-label" for="verifikasi_jr">
                                      Verifikasi Jasa Raharja  
                                  </label>
                              </div>
                              <div id="hak_akses_penetapan" style="display: none">
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
                              <div id="hak_akses_laporan" style="display: none">
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
                              <div id="hak_akses_form_khusus" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="form_khusus" name="form_khusus">
                                  <label class="form-check-label" for="form_khusus">
                                      Form Khusus  
                                  </label>
                              </div>
                              <div id="hak_akses_form_fiskal" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="form_fiskal" name="form_fiskal">
                                  <label class="form-check-label" for="form_fiskal">
                                      Form Fiskal  
                                  </label>
                              </div>
                              <div id="hak_akses_blokir_kendaraan" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="blokir_kendaraan" name="blokir_kendaraan">
                                  <label class="form-check-label" for="blokir_kendaraan">
                                      Blokir Kendaraan  
                                  </label>
                              </div>
                              <div id="hak_akses_informasi_kendaraan" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="informasi_kendaraan" name="informasi_kendaraan">
                                  <label class="form-check-label" for="informasi_kendaraan">
                                      Informasi Kendaraan  
                                  </label>
                              </div>
                              <div id="hak_akses_admin_progresif" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="admin_progresif" name="admin_progresif">
                                  <label class="form-check-label" for="admin_progresif">
                                      Admin Progresif  
                                  </label>
                              </div>
                              <div id="hak_akses_split_jr" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="split_jr" name="split_jr">
                                  <label class="form-check-label" for="split_jr">
                                      Split Jasa Raharja  
                                  </label>
                              </div>
                              <div id="hak_akses_status_transaksi" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="status_transaksi" name="status_transaksi">
                                  <label class="form-check-label" for="status_transaksi">
                                      Status Transaksi 
                                  </label>
                              </div>
                              <div id="hak_akses_perbaikan_data_sjo" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="perbaikan_data_sjo" name="perbaikan_data_sjo">
                                  <label class="form-check-label" for="perbaikan_data_sjo">
                                      Perbaikan Data SJO 
                                  </label>
                              </div>
                              <div id="hak_akses_hapus_transaksi_kepala_uppd" style="display: none">
                                  <input class="form-check-input" type="checkbox" value="1" id="hapus_transaksi_kepala_uppd" name="hapus_transaksi_kepala_uppd">
                                  <label class="form-check-label" for="hapus_transaksi_kepala_uppd">
                                      Hapus Transaksi Kepala UPPD
                                  </label>
                              </div>
                              <div id="hak_akses_keringanan" style="display: none">
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
                          <div id="hak_akses_manajemen_menu" style="display: none">
                              <input class="form-check-input" type="checkbox" value="1" id="manajemen_menu" name="manajemen_menu">
                              <label class="form-check-label" for="manajemen_menu">
                                  Manajemen Menu
                              </label>
                          </div>
                          <div id="hak_akses_perbaikan_data_verifikasi_valbin" style="display: none">
                              <input class="form-check-input" type="checkbox" value="1" id="perbaikan_data_verifikasi_valbin" name="perbaikan_data_verifikasi_valbin">
                              <label class="form-check-label" for="perbaikan_data_verifikasi">
                                  Perbaikan Data Verifikasi (Valbin)
                              </label>
                          </div>
                      </div>      
                  </div>
                  {{-- Akhir Hak Akses--}}

              </div>
          </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary" id="btn-tambah-user">Simpan</button>
      </div>
  </form>
    </div>
  </div>
</div>