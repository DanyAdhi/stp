<style>
  table tr {
    padding: 5px
  }
</style>

<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Detail Peserta</h6>
      </div>
  </div>
  <div class="card-body w-100">
    <table class="table">
      <tr>
        <td style="width: 130px;">NIK</td>
        <td width="10px">:</td>
        <td><?= $peserta->nik ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $peserta->name ?></td>
      </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?= $peserta->place_of_birth ?></td>
      </tr>
      <tr>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td><?= date('d F Y', strtotime($peserta->date_of_birth)) ?></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= $peserta->gender ?></td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?= $peserta->religion ?></td>
      </tr>
      <tr>
        <td>Nama Orang Tua</td>
        <td>:</td>
        <td><?= $peserta->parents_name ?></td>
      </tr>
      <tr>
        <td>Domisili</td>
        <td>:</td>
        <td><?= $peserta->domicile ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $peserta->address ?></td>
      </tr>
      <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td><?= $peserta->handphone ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><?= $peserta->email ?></td>
      </tr>
      <tr>
        <td>KTP</td>
        <td>:</td>
        <td>
          <img src="<?=base_url('/assets/image/member/'.$peserta->ktp)?>" class="shadow-sm" widht="100px" height="100px">
        </td>
      </tr>
      <tr>
        <td>KK</td>
        <td>:</td>
        <td>
          <img src="<?=base_url('/assets/image/member/'.$peserta->kk)?>" class="shadow-sm" widht="100px" height="100px">
        </td>
      </tr>
      <tr>
        <td>Surat Keterangan Dokter</td>
        <td>:</td>
        <td>
          <img src="<?=base_url('/assets/image/member/'.$peserta->medical_certificate)?>" class="shadow-sm" widht="100px" height="100px">
        </td>
      </tr>
    </table>
  </div>
</div>