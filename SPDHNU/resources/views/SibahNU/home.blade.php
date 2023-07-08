@include('SibahNU.template.header')
@include('SibahNU.template.navigator',$display_menus)
<div class="tab-pane fade show active" id="pills-data-mwcnu" role="tabpanel" aria-labelledby="data-mwcnu-tab">
  @include('sweetalert::alert')
  <template x-if="isLoading">
    <div class="fixed inset-0 z-[100] bg-white">
        <div class="flex h-screen w-full items-center justify-center bg-gray-100">
          <div class="custom-loader"></div>
        </div>
      </div>
    </template>
  <!-- Multi Columns Form -->
  <form method="POST" action="{{route('lembaga')}}">
    @csrf
    <div class="row g-3">
      <div class="col-md-6">
        <label for="inputName5" class="form-label">
          Nama MWCNU
          <sup class="text-danger">*</sup>
        </label>
        <input type="text" class="form-control" id="nama_lembaga" value="{{$user->nama_mwc}}" disabled />
        <input type="hidden" name="nama_lembaga" value="{{$user->nama_mwc}}" />
      </div>
      <div class="col-md-6">
        <label for="input-alamat" class="form-label">
          Alamat MWCNU
          <sup class="text-danger">*</sup>
        </label>
        <textarea type="text" class="form-control" value="{{$kecamatan->nama}}" id="input-alamat" name="alamat_lembaga" required></textarea>
      </div>
    </div>

        <div class="row g-3 pt-4">
        <div class="col-md-6">
            <label for="no_telp" class="form-label">
            No tlp / Handphone
            <sup class="text-danger">*</sup>
            </label>
            <input type="text" name="no_telp" class="form-control" id="input-tlp" />
        </div>

      <div class="col-md-6">
        <label for="input-email" class="form-label">
          Email MWCNU
          <sup class="text-danger">*</sup>
        </label>
        <input type="email" name="email_lembaga" class="form-control" id="input-email" />
      </div>
    </div>
    <div class="row g-3 pt-4">
      <div class="col-md-4">
        <label for="input-kabupaten" class="form-label">
          Kabupaten
          <sup class="text-danger">*</sup>
        </label>
        <input type="text" class="form-control" value="{{$kabupaten->nama}}" id="input-kabupaten" disabled />
        <input type="hidden" name="kabupaten" value="{{$kabupaten->kode}}" />
      </div>

      <div class="col-md-4">
        <label for="input-kecamatan" class="form-label">
          Kecamatan
          <sup class="text-danger">*</sup>
        </label>
        <input type="text" value="{{$kecamatan->nama}}" class="form-control" id="input-kecamatan" disabled />
        <input type="hidden" name="kecamatan" value="{{$kecamatan->kode}}" />
      </div>

        <div class="col-md-4">
            <label for="input-desa" class="form-label">
            Desa
            <sup class="text-danger">*</sup>
            </label>
            <select name="desa" class="form-control" id="input-desa">
            <option value="0">--Pilih Desa--</option>
            @foreach ($desa as $item)
            <option value="{{ $item->kode }}">{{ $item->nama }}</option>
            @endforeach
            </select>
        </div>
        </div>
        <div class="row g-3 pt-4">
        <div class="col-md-6">
            <label for="input-kabupaten" class="form-label">
            Kop surat MWCNU
            <sup class="text-danger">*</sup>
            </label>
            <input type="file" name="kop_surat" class="form-control" id="input-kabupaten" />
            <span class="badge bg-primary">
            File harus berupa JPG/PNG
            </span>
        </div>

        <div class="col-md-6">
            <label for="input-kecamatan" class="form-label">
            Domisili MWCNU
            <sup class="text-danger">*</sup>
            </label>
            <input type="file" class="form-control" id="input-kecamatan" name="domisili" accept="application/pdf" />
            <span class="badge bg-primary">
            File harus berupa PDF
            </span>
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
