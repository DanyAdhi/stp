<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <style>
      #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #table td, #table th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #table tr:nth-child(even){background-color: #f2f2f2;}

      #table tr:hover {background-color: #ddd;}

      #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
      }
    </style>
  </head>
  <body>
    <div style="text-align:center">
      <h2> Laporan</h2>
      <h2 style="margin-bottom: 30px"> Progres Rehabilitasi Sentra Terpadu Pangudiluhur</h2>
      <h2><?= $program;?></hr>
    </div>
    <table id="table">
      <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Pembimbing</th>
            <th>Progress</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($progress as $key => $value): ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->created_at ?></td>
            <td><?= $value->mentor ?></td>
            <td><?= $value->progress ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>