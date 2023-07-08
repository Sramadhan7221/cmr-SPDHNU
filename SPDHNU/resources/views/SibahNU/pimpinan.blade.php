@include('SibahNU.template.header')
@include('SibahNU.template.navigator',$display_menus)
<div class="tab-pane fade show active" id="pills-data-pimpinan" role="tabpanel" aria-labelledby="data-pimpinan-tab">
   @include('sweetalert::alert')
   <template x-if="isLoading">
    <div class="fixed inset-0 z-[100] bg-white">
        <div class="flex h-screen w-full items-center justify-center bg-gray-100">
          <div class="custom-loader"></div>
        </div>
      </div>
    </template>
   <!-- Multi Columns Form -->
   <template x-if="!isLoading">
    <form method="POST" action="{{route('addpimpinan')}}">
        @csrf
        <div class="row g-3 mt-4">
            <div class="col-md-4">
                <label for="inputName5" class="form-label">
                Nama Lengkap
                <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="nama_pengurus" class="form-control" id="inputName5" required />
            </div>
            <div class="col-md-4">
                <label for="input-jabatan" class="form-label">
                Jabatan
                <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="jabatan" class="form-control" id="input-jabatan" required />
            </div>
            <div class="col-md-4">
                <label for="input-nik" class="form-label">
                No KTP Ketua MWCNU
                <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="no_ktp" class="form-control" id="input-nik" required />
            </div>
        </div>

        <div class="row g-3 pt-4">
            <div class="col-md-4">
                <label for="input-tlp" class="form-label">
                No HP Ketua MWC
                <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="no_telp" class="form-control" id="input-tlp" required />
            </div>
            <div class="col-md-4">
                <label for="input-ktp" class="form-label">
                File KTP Ketua
                <sup class="text-danger">*</sup>
                </label>
                <input type="file" name="file_ktp" class="form-control" id="input-ktp" required accept="application/pdf" />
                <span class="badge bg-primary">
                File harus berupa PDF
                </span>
            </div>
        </div>

        <div class="row g-3 pt-4">
            <div class="col-md-12">
                <label for="input-alamat-ketua" class="form-label">
                Alamat Ketua Sesuai KTP
                <sup class="text-danger">*</sup>
                </label>
                <div class="col-sm-10">
                <textarea id="input-alamat-ketua" name="alamat_ktp" class="form-control" style="height: 100px"></textarea>
                </div>
            </div>
        </div>
        <div class="row g-3 pt-4 mt-4 mb-4">
            <div class="text-end">
                <button type="submit" class="btn btn-primary col-md-3">
                <i class="ri-file-edit-line"></i>
                Perbaharui data MWCNU
                </button>
            </div>
        </div>
    </form>
   </template>
   <!-- End Multi Columns Form -->
</div>
@include('SibahNU.template.footer')
