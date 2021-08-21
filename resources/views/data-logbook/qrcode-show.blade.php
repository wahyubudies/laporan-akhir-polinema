<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Qr Code</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="d-flex justify-content-center align-items-center flex-column vh-100">
  <h3 class="mb-4">Qr Code Generator</h3>
  {!! QrCode::size(200)->generate("Dosen : " . $data->pembimbing . "\n" . "Mahasiswa : " . $data->mahasiswa . "\n" . "Tanggal : " . \Carbon\Carbon::now()->format('d-m-Y') ) !!}
  <table class="text-center mt-4">
    <tr>
      <td class="py-1">
        Nama Pembimbing : {{$data->pembimbing}}
      </td>
    </tr>
    <tr>
      <td class="py-1">
        Nama Mahasiswa : {{$data->mahasiswa}}
      </td>
    </tr>
    <tr>
      <td class="py-1">
        Tanggal : {{ $data->tanggal }}
      </td>
    </tr>
    <tr>
      <td class="py-1">
        <form onsubmit="return confirm('Apakah anda yakin untuk mendownload')" action="{{route('qrcode-generator.download', $data->id)}}">
          <button type="submit" class="btn btn-sm btn-success">Download</button>
          <a href="{{route('qrcode-generator')}}" class="btn btn-sm btn-secondary">Kembali</a>
        </form>
      </td>
    </tr>
  </table>
</body>
</html>