
<!-- Modal Tambah User -->
<div class="modal" id="modal-tambah-level" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg overflow-auto" >
        <form id="form-level">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Tambah Level</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @csrf
                    <div class="mb-3">
                        <label for="level" class="col-sm-3 col-form-label ms-2">Nama Level</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="level-input" name="level" value="{{old('level')}}" autofocus>
                        </div>
                        <div class="text-danger fs-6 fst-italic" id="level-error"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn-add-level">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>