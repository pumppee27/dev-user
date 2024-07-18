
<!-- Modal Tambah UPPD -->
<div class="modal" id="modal-tambah-uppd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg overflow-auto" >
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Tambah Data UPPD</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <form id="form-tambah-uppd">
      </div>
      <div class="modal-body">
            <div class="row">
                        @csrf
                        <div class="mb-3">
                            <label for="uppd-nama_uppd" class="col-sm-3 col-form-label ms-2">Nama UPPD</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="nama-uppd-input" name="nama_uppd" autofocus='on' value="{{old('nama_uppd')}}">
                            </div>
                            <input type="checkbox" name="" id="">
                            <div class="text-danger fs-6 fst-italic" id="nama-uppd-error-tambah">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="uppd-wilayah_kerja" class="col-sm-3 col-form-label ms-2">Wilayah Kerja</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="wilayah-kerja-input" name="wilayah_kerja" value="{{old('wilayah_kerja')}}">
                            </div>
                            <div class="text-danger fs-6 fst-italic" id="wilayah-kerja-error-tambah">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="col-sm-3 col-form-label ms-2">Kota</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="kota-input" name="kota" value="{{old('kota')}}">
                            </div>
                            <div class="text-danger fs-6 fst-italic" id="kota-uppd-error-tambah">
                            </div>
                        </div>   
                
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="btn-tambah-uppd">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>