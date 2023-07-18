@include('SibahNU.template.header_hibah')
@include('SibahNU.template.navigator_hibah',['menu'=>$display_menu, 'proposal'=>$proposal, 'kegiatan'=>$kegiatan])

<template x-if="isLoading">
    <div class="fixed inset-0 z-[100] bg-white">
      <div class="flex h-screen w-full items-center justify-center bg-gray-100">
        <div class="custom-loader"></div>
      </div>
    </div>
  </template>
<div class="tab-pane fade show active" id="pills-rab" role="tabpanel" aria-labelledby="rab-tab">
  <div class="text-end">
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#verticalycentered">
      <i class="ri-file-edit-line"></i>
      Tambah RAB
    </button>
  </div>
  <div class="text-start">
    <ul class="flex gap-2 mb-2">
        <li>Nama Kegiatan :</li>
        <li class="font-bold">{{$kegiatan->nama_kegiatan}}</li>
    </ul>
  </div>
  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Uraian Rab
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('rab-add',['id_kegiatan' => $kegiatan->id]) }}">
            @csrf
            <div class="row g-3 mb-4">
              <div class="col-md-12">
                <label for="uraian" class="form-label d-flex justify-content-start">
                  Uraian
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" name="uraian" />
                <input type="hidden" name="id_rab" />
              </div>
            </div>
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label for="satuan" class="form-label d-flex justify-content-start">
                  Volume / Satuan
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" name="satuan" />
              </div>
              <div class="col-md-6">
                <label for="qty" class="form-label d-flex justify-content-start">
                  Jumlah
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" name="qty" />
              </div>
            </div>
            <div class="row g-3 mb-4">
              <div class="col-md-12">
                <label for="harga" class="form-label d-flex justify-content-start">
                  Harga Satuan
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" name="harga" />
              </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-outline-success" data-bs-dismiss="modal">
                  <i class="ri-file-edit-line"></i>
                  Simpan data
                </button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Uraian</th>
        <th scope="col">Volume / Satuan</th>
        <th scope="col">QTY</th>
        <th scope="col">Harga</th>
        <th scope="col">Total</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dataRab as $key => $rab)
        <tr>
            <td>{{$key+1}}</td>
      <td>{{$rab->uraian}}</td>
      <td>{{$rab->satuan}}</td>
      <td>{{$rab->qty}}</td>
      <td>Rp.{{ number_format($rab->harga,0,',','.') }}</td>
      <td>Rp.{{ number_format($rab->total,0,',','.') }}</td>
      <td>
        <button type="button" class="btn btn-outline-primary">
          <i class="bi bi-pencil-square"></i>
        </button>
        <a href="{{route('rab-del',['id_rab' => $rab->id_rab])}}">
          <button type="button" class="btn btn-outline-danger">
            <i class="bi bi-trash"></i>
          </button>
        </a>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="modal fade" id="add-sub-kegiatan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Sub Kegiatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row g-3">
              <div class="col-md-12">
                <label for="input-uraian" class="form-label d-flex justify-content-start">
                  Uraian Kegiatan / Pengelompokan Pengeluaran
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="input-uraian" required disabled placeholder="Peralatan" />
              </div>
            </div>
            <div class="row g-3 mt-2">
              <div class="col-md-12">
                <label for="input-sub-uraian" class="form-label d-flex justify-content-start">
                  Nama Uraian Kegiatan
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="input-sub-uraian" required />
              </div>
            </div>

            <div class="row g-3 mt-2">
              <div class="col-md-8">
                <label for="input-sub-uraian" class="form-label d-flex justify-content-start">
                  Volume / Satuan
                  <sup class="text-danger">*</sup>
                </label>
                <div class="d-flex justify-content-start" id="input-sub-uraian">
                  <input type="text" class="form-control" required />
                  <select class="form-select">
                    <option selected>Unit</option>
                    <option>...</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row g-3 mt-2">
              <div class="col-md-8">
                <label for="input-harga" class="form-label d-flex justify-content-start">
                  Harga
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="input-harga" required />
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
            <i class="ri-file-edit-line"></i>
            Simpan data
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit-sub-kegiatan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Sub Kegiatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row g-3">
              <div class="col-md-12">
                <label for="input-uraian" class="form-label d-flex justify-content-start">
                  Uraian Kegiatan / Pengelompokan Pengeluaran
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="input-uraian" required disabled placeholder="Peralatan" />
              </div>
            </div>
            <div class="row g-3 mt-2">
              <div class="col-md-12">
                <label for="input-sub-uraian" class="form-label d-flex justify-content-start">
                  Nama Uraian Kegiatan
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="input-sub-uraian" required />
              </div>
            </div>

            <div class="row g-3 mt-2">
              <div class="col-md-8">
                <label for="input-sub-uraian" class="form-label d-flex justify-content-start">
                  Volume / Satuan
                  <sup class="text-danger">*</sup>
                </label>
                <div class="d-flex justify-content-start" id="input-sub-uraian">
                  <input type="text" class="form-control" required />
                  <select class="form-select">
                    <option selected>Unit</option>
                    <option>...</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row g-3 mt-2">
              <div class="col-md-8">
                <label for="input-harga" class="form-label d-flex justify-content-start">
                  Harga
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="input-harga" required />
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
            <i class="ri-file-edit-line"></i>
            Simpan data
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@include('SibahNU.template.footer')