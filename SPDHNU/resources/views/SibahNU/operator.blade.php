@include('SibahNU.template.header')
@include('SibahNU.template.navigator',$display_menus)
<div class="tab-pane fade show active" id="pills-data-operator" role="tabpanel" aria-labelledby="data-operator-tab">
  @include('sweetalert::alert')
 {{-- Loading --}}
  <template x-if="isLoading">
    <div class="fixed inset-0 z-[100] bg-white">
        <div class="flex h-screen w-full items-center justify-center bg-gray-100">
          <div class="custom-loader"></div>
        </div>
      </div>
    </template>
  <!-- Multi Columns Form -->
  <template x-if="!isLoading">
    <form method="POST" action="{{route('addoperator')}}">
        @csrf
        <div class="row g-3 mt-4">
        <div class="col-md-4">
            <label for="inputName5" class="form-label">
            Nama Lengkap
            <sup class="text-danger">*</sup>
            </label>
            <input type="text" name="nama_pengurus" class="form-control" id="inputName5" />
        </div>

        <div class="col-md-4">
            <label for="input-nik" class="form-label">
            No KTP Operator MWCNU
            <sup class="text-danger">*</sup>
            </label>
            <input type="text" class="form-control" name="no_ktp" id="input-nik" />
        </div>

        <div class="col-md-4">
            <label for="input-tlp" class="form-label">
            No HP Operator MWC
            <sup class="text-danger">*</sup>
            </label>
            <input type="text" class="form-control" name="no_telp" id="input-tlp" />
        </div>
        </div>

        <div class="row g-3 pt-4">
        <div class="col-md-12">
            <label for="input-alamat-operator" class="form-label">
            Alamat Operator Sesuai KTP
            <sup class="text-danger">*</sup>
            </label>
            <div class="col-sm-10">
            <textarea id="input-alamat-operator" name="alamat_ktp" class="form-control" style="height: 100px"></textarea>
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
