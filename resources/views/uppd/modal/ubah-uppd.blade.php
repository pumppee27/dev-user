<!-- Modal Ubah UPPD -->
<div class="modal" id="modal-ubah-uppd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg overflow-auto" >
      <div class="modal-content">
          <form id="form-uppd-update">
          @csrf
          @method('patch')
          <div class="modal-header bg-primary">
              <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Ubah Data UPPD</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
              <div class="row">
                  <div class="mb-3">
                      <label for="nama_uppd" class="col-sm-3 col-form-label ms-2">Nama UPPD</label>
                      <div class="col-sm">
                          <input type="hidden" class="form-control" id="id_uppd">
                          <input type="text" class="form-control" id="nama-uppd" name="nama_uppd">
                      </div>
                        <div class="text-danger fs-6 fst-italic" id="nama-uppd-error-update">
                        </div>
                      
                  </div>
                  <div class="mb-3">
                      <label for="wilayah_kerja" class="col-sm-3 col-form-label ms-2">Wilayah Kerja</label>
                      <div class="col-sm">
                          <input type="text" class="form-control" id="wilayah-kerja" name="wilayah_kerja">
                      </div>
                      <div class="text-danger fs-6 fst-italic" id="wilayah-kerja-error-update">
                        </div>
                  </div>
                  <div class="mb-3">
                      <label for="kota" class="col-sm-3 col-form-label ms-2">Kota</label>
                      <div class="col-sm">
                          <input type="text" class="form-control" id="kota" name="kota">
                      </div>
                      <div class="text-danger fs-6 fst-italic" id="kota-uppd-error-update">
                        </div>
                  </div>   
              </div>
          </div>
          <div class="modal-footer">
          <button class="btn btn-primary" id="btn-update-uppd">Simpan</button>
          </div>
          </form>
      </div>
  </div>
</div>