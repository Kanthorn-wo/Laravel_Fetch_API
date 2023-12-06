<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>Fectch API</title>
</head>

<body>

  <div class="container mt-4">
    <form action="{{ route('fetch.data')}}" method="get">
      @csrf
      <div class="form-group">
        <label for="option">เลือกข้อมูล</label>
        <select class="form-control" name="name_product">
          <option selected>เลือก</option>
          <option value="R11030">R11030 : ข้าวหอมมะลิ 100% ชั้น 1 (ข้าวใหม่)</option>
          <option value="R12007">R12007 : ข้าวสารเหนียว สันป่าตอง (เขี้ยวงู) 100%</option>
          <option value="P11001">สุกรชำแหละ เนื้อสัน สันใน</option>
        </select>
      </div>
      <div class="form-group">
        <label for="option">วันเริ่มต้น</label>
        <input type="date" class="form-control" name="start_date" autocomplete="start_date">
      </div>
      <div class="form-group">
        <label for="option">วันสิ้นสุด</label>
        <input type="date" class="form-control" name="end_date" autocomplete="end_date">
      </div>
      <button class="btn btn-primary w-100" type="submit">ดึงข้อมูล</button>
    </form>

    @if (!isset($data) || is_null($data))
    <p>No data</p>
    @else
    <div>


      <div class="card mt-4">
        <div class="card-header">
          Price List
        </div>

        <div class="card-body">
          <h1>{{ $data['product_name'] }}</h1>
          <p><strong>Product ID:</strong> {{ $data['product_id'] }}</p>
          <p><strong>Category:</strong> {{ $data['category_name'] }}</p>
          <p><strong>Group:</strong> {{ $data['group_name'] }}</p>
          <p><strong>Unit:</strong> {{ $data['unit'] }}</p>
          <table class="table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Min Price</th>
                <th>Max Price</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data['price_list'] as $price)
              <tr>
                <td>{{ \Carbon\Carbon::parse($price['date'])->thaidate() }}</td>
                <td>{{ $price['price_min'] }}</td>
                <td>{{ $price['price_max'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>



    </div>
    @endif


  </div>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>