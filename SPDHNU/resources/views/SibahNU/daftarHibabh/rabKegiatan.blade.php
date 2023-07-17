@include('SibahNU.template.header_hibah')
@include('SibahNU.template.navigator_hibah',['menu'=>$display_menu, 'proposal'=>$proposal])
<div class="tab-pane fade show active" id="pills-kegiatan" role="tabpanel" aria-labelledby="kegiatan-tab">
  <!-- Multi Columns Form -->
  <form method="POST" action="{{route('addRabKegiatan')}}">
    @csrf
    <div class="row g-3 mt-4">
      <div class="col-md-4">
        <label for="nama_kegiatan" class="form-label">
          Sub Kegiatan
          <sup class="text-danger">*</sup>
        </label>
        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required />
        <input type="hidden" class="form-control" id="id_kegiatan" name="id_kegiatan" />
      </div>
    </div>
    <div class="row g-3 pt-4 mt-4 mb-4">
      <div class="text-end">
        <button type="submit" class="btn btn-primary col-md-3">
          <i class="ri-file-edit-line"></i>
          Tambah Sub Kegiatan
        </button>
      </div>
    </div>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Sub Kegiatan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($list_sub as $key => $value)
      <tr>
        <td>{{$key}}</td>
        <td>{{$value->nama_kegiatan}}</td>
        <td>
          <div class="row">
            <div class="col-sm-12">
              <button type="button" class="edit col-sm-5 bg-yellow-400 p-1 rounded-md" data-item="{{$value->id}}"><x-heroicon-o-pencil-square /></button>
              <a href="{{route('deleteKegiatan',$value->id)}}">
                <button type="button" class="delete col-sm-5 bg-red-600 p-1 rounded-md"><x-heroicon-o-backspace /></button>
              </a>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
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
    })
  }
</script>