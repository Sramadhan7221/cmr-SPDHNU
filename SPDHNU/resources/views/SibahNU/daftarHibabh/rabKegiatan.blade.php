@include('SibahNU.template.header_hibah',['actived_menu'=>$actived_menu])
@include('SibahNU.template.navigator_hibah',['menu'=>$display_menu, 'proposal'=>$proposal])

<template x-if="isLoading">
  <div class="fixed inset-0 z-[100] bg-white">
    <div class="flex h-screen w-full items-center justify-center bg-gray-100">
      <div class="custom-loader"></div>
    </div>
  </div>
</template>
<div class="text-end">
  <button type="submit" class="btn btn-outline-success col-md-3" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#verticalycentered">
    <i class="ri-file-edit-line"></i>
    Tambah RAB
  </button>
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
        <form method="POST" action="{{ route('addRabKegiatan') }}">
          @csrf
          <div class="row g-3 mb-4">
            <div class="col-md-12">
              <label for="uraian" class="form-label d-flex justify-content-start">
                Nama Kegiatan
                <sup class="text-danger">*</sup>
              </label>
              <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required />
              <input type="hidden" class="form-control" id="id_kegiatan" name="id_kegiatan" />
              <input type="hidden" class="form-control" id="id_proposal" name="id_proposal" value="{{$proposal->id_proposal}}" />
            </div>
          </div>
      </div>
      <div class="text-end p-3">
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
      <th scope="col">Sub Kegiatan</th>
      <th scope="col">Sub Total</th>
      <th scope="col" class="text-center">Aksi</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($list_kegiatan as $key => $value)
    <tr>
      <td>{{$key+1}}</td>
      <td>{{$value->nama_kegiatan}}</td>
      <td>Rp. {{number_format($value->sub_total,0,',','.')}}</td>
      <td>
        <div class="row">
          <div class="col-sm-12 d-flex justify-content-center">
            <button type="button" class="edit col-sm-4 btn btn-outline-success p-1 rounded-md mr-1" data-item="{{$value->id}}"><x-heroicon-o-pencil-square /></button>
            <a href="{{route('deleteKegiatan',$value->id)}}" class="delete col-sm-4 btn btn-outline-danger p-1 rounded-md ml-1">
              <x-heroicon-o-backspace />
            </a>
          </div>
        </div>
      </td>
      <td>
        <a href="{{route('dataRab', $value->id)}}" class="btn btn-outline-primary p-1 rounded-md">
          Tambah Rincian RAB
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<ul class="flex justify-between">
  <li class="font-bold">- Total RAB</li>
  <li class="font-bold">Rp. {{number_format($total_rab->total_rab,0,',','.')}}</li>
</ul>
<!-- End Multi Columns Form -->
</div>
@include('SibahNU.template.footer')
<script>
  $(document).on('click', '.edit', function(o) {
    let id = $(this).attr('data-item');
    getData(id);
  })

  function getData(id) {
    $.get("{{route('getRabKegiatan')}}?id_kegiatan=" + id, function(o) {
      $("#id_kegiatan").val(o.id);
      $("#nama_kegiatan").val(o.nama_kegiatan);
      $("#verticalycentered").modal('show');
    })
  }
</script>
