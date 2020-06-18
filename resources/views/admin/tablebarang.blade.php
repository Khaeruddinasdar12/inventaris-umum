 @php
 $no = 1 ;
 @endphp
 
 @foreach($data as $datas)
 <tr class="data-row">
  <td>{{$no++}}</td>>
  <td>{{$datas->nama}}</td>
  <td>{{$datas->kondisi}}</td>
  <td>{{$datas->jumlah}}</td>
  <td>{{$datas->stok}}</td>
  <td>{{$datas->created_at}}</td>
  <td>
    <img src="{{asset('storage/' . $datas->foto)}}"
    width="120px"></td>
    <td>{{$datas->created_by}}</td>
    <td>
      <button data-toggle='modal' data-target='#confirm-edit' class="btn btn-success btn-xs"
      title="Edit Data" id="edit-item" data-item-id="1">
      <i class="fa fa-pencil"></i>
    </button>

    <button class="btn btn-danger btn-xs" title="Hapus Data">
      <i class="fa fa-trash"></i>
    </button>
  </td>
</tr>
@endforeach
<!-- 
  @php
    echo json_encode($data);
  @endphp -->

