<!-- Modal Ubah Level -->
<div class="modal" id="modal-edit-level" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-lg overflow-auto" >
    <form id="form-level-update">
      <div class="modal-content">
          <div class="modal-header bg-primary">
              <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Ubah Level</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
            <div class="row">
              @csrf
              @method('patch')
              <div class="mb-3">
                  <label for="level" class="col-sm-3 col-form-label ms-2">Nama Level</label>
                  <div class="col-12">
                      <input type="hidden" class="form-control" id="id_level" name="id">
                      <input type="text" class="form-control" id="up_level" name="level">
                  </div>
                  <div class="text-danger fs-6 fst-italic" id="level-error-edit">
                          
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary update-level" id="btn-update-level">Ubah</button>
          </div>
      </div>
    </form>
  </div>
</div>