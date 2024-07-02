<!DOCTYPE html>
<html>
<head>
    <title>Cetakan Pasien {{ $data->mr_no }}</title>

    <style>
      h1 {
        font-size: 14pt;
      }
      th, td, p, b {
        font-size: 12pt
      }
      .title {
        font-size: 16pt;
      }
      .order_no {
        font-size: 40pt;
      }
      th.queue {
        border: 1px solid black; 
        padding: 5px; 
        margin-left: 20px;
      }

      /* Text Alignment */
      .text-left {
        text-align: left;
      }
      .text-center {
        text-align: center;
      }
      .text-right {
        text-align: right;
      }

      /* Margin */
      .mb-2 {
        margin-bottom: 20px !important;
      }
    </style>
</head>
<body>
  <h1 class="text-center">{!! $title !!}</h1><hr class="mb-2">

  <table class="mb-2">
    <tr>
      <th class="text-left">No RM</th>
      <th class="text-left">:</th>
      <td>{{ $data->mr_no }}</td>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th rowspan="7" class="queue">
        <div class="title">ANTRIAN</div>
        <div class="order_no">{{ $data->order_no }}</div>
      </th>
    </tr>
    <tr>
      <th class="text-left">No Reg</th>
      <th class="text-left">:</th>
      <td>{{ $data->registration_no }}</td>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    <tr>
      <th class="text-left">Nama</th>
      <th class="text-left">:</th>
      <td>{{ $data->full_name }}</td>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    <tr>
      <th class="text-left">NIK</th>
      <th class="text-left">:</th>
      <td>{{ $data->nik }}</td>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    <tr>
      <th class="text-left">Tgl Lahir</th>
      <th class="text-left">:</th>
      <td>{{ date('d M Y', strtotime($data->birth_date)) }}</td>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    <tr>
      <th class="text-left">Status</th>
      <th class="text-left">:</th>
      <td>UMUM</td>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    <tr>
      <th class="text-left">Poli</th>
      <th class="text-left">:</th>
      <td>{{ $data->poli_name }}</td>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    <tr>
      <th class="text-left">Dokter</th>
      <th class="text-left">:</th>
      <td>{{ $data->doctor_name }}</td>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    <tr>
      <th class="text-left">Tgl Periksa</th>
      <th class="text-left">:</th>
      <td>{{ date('d M Y', strtotime($data->registration_date)) }}</td>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
  </table>

  <p class="text-center">
    Jangan Sampai Hilang<br>
    <b>{{ $data->description }}</b><br>
    Terima Kasih Atas Kunjungannya<br>
    Tgl Cetak: <b>{{ date('d M Y H:i:s', strtotime(now())) }}</b>
  </p>
</body>
</html>
