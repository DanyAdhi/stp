<style>
  table tr {
    padding: 5px
  }
</style>

<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Profile</h6>
      </div>
  </div>
  <div class="card-body w-100">
    <table class="table">
      <tr>
        <td style="width: 130px">Nama</td>
        <td style="width: 10px">:</td>
        <td><?= $profile->name ?></td>
      </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?= $profile->place_of_birth ?></td>
      </tr>
      <tr>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td><?= date('d F Y', strtotime($profile->date_of_birth)) ?></td>
      </tr>
      <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td><?= $profile->handphone ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><?= $profile->email ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $profile->address ?></td>
      </tr>
      <tr>
        <td>Program</td>
        <td>:</td>
        <td><?= $profile->program ?></td>
      </tr>
    </table>
  </div>
</div>