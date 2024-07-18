
<!-- Modal Detail Lokasi -->
<div class="modal" id="modal-detail-lokasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg overflow-auto" >
    <div class="modal-content">
    <form id="form-tambah-lokasi">
      @csrf
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Detail Lokasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="mb-3 col-lg-6">
              <label for="uppd-nama_uppd" class="col-sm-3 col-form-label">Level</label>
              <input type="text" class="form-control" id="detail-level-lokasi" readonly>
          </div>
          <div class="mb-3 col-lg-6">
              <label for="uppd-nama_uppd" class="col-sm-3 col-form-label">UPPD</label>
              <input type="text" class="form-control" id="detail-uppd-lokasi" readonly>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-lg-6">
              <label for="" class="col-sm-3 col-form-label">Kode Lokasi</label>
              <div class="col-sm">
                  <input type="text" class="form-control" id="detail-kode-lokasi" readonly>
              </div>
          </div>
          <div class="mb-3 col-lg-6">
              <label for="" class="col-sm-3 col-form-label">Lokasi</label>
              <div class="col-sm">
                  <input type="text" class="form-control" id="detail-lokasi" readonly>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </form>
    </div>
  </div>
</div>