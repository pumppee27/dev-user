
<!-- Modal Ubah Lokasi -->
<div class="modal" id="modal-ubah-lokasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg overflow-auto" >
    <div class="modal-content">
    <form id="form-tambah-lokasi">
      @csrf
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Ubah Data Lokasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="mb-3 col-lg-6">
              <label for="uppd-nama_uppd" class="col-sm-3 col-form-label">Level</label>
              <select class="form-select" name="level_id" id="select-ubah-level-lokasi" aria-label="Default select example">
              </select>
          </div>
          <div class="mb-3 col-lg-6">
              <label for="uppd-nama_uppd" class="col-sm-3 col-form-label">UPPD</label>
              <select class="form-select select-uppd-lokasi" name="uppd_id" id="select-ubah-uppd-lokasi" aria-label="Default select example">
              </select>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-lg-6">
              <label for="uppd-wilayah_kerja" class="col-sm-3 col-form-label">Kode Lokasi</label>
              <div class="col-sm">
                  <input type="text" class="form-control" id="ubah-kode-lokasi" name="kode_lokasi" value="{{old('kode_lokasi')}}">
              </div>
          </div>
          <div class="mb-3 col-lg-6">
              <label for="uppd-wilayah_kerja" class="col-sm-3 col-form-label ms-2">Lokasi</label>
              <div class="col-sm">
                  <input type="text" class="form-control" id="ubah-lokasi" name="lokasi" value="{{old('lokasi')}}">
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="btn-tambah-lokasi">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>