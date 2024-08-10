<div>

<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Sku</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr>
                <th scope="row">{{ $item->name }}</th>
                <td>{{ $item->sku }}</td>
                <td>{{ $item->id }}</td>
            </tr>
            @endforeach
          
       
        </tbody>
      </table>


</div>



  <input type="text" wire:model.live="barcode" placeholder="Quét mã vạch tại đây">
  <div>
      @if ($result)
          <p>Thông tin mã vạch: {{ $result}}</p>
      @else
          <p>Không tìm thấy mã vạch</p>
      @endif
  </div>
</div>