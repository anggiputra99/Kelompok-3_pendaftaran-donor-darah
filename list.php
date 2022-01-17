<font color="blue">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<p>
<table border="1" align="center">
    <tr>
    <tr>
    <th colspan="8" style="background-color: red">DATA PENDONOR</th>
    </tr>

    <th width="130px">ID PENDONOR</th>
    <th width="200px">NAMA</th>
    <th width="150px">ALAMAT</th>
    <th width="150px">TANGGAL LAHIR</th>
    <th width="150px">JENIS KELAMIN</th>
    <th width="180px">GOLONGAN DARAH</th>
    <th width="100px">ACTION</th>
    </tr>
    <?php
    foreach ((array) $datapendonor as $pendonor){
        echo "<tr align=center>
              <td>$pendonor->id_pendonor</td>
              <td>$pendonor->nama</td>
              <td>$pendonor->alamat</td>
              <td>$pendonor->tanggal_lahir</td>
              <td>$pendonor->jenis_kelamin</td>
              <td>$pendonor->gol_darah</td>
              <td>".anchor('pendonor/edit/'.$pendonor->id_pendonor,'Edit')."
                  ".anchor('pendonor/delete/'.$pendonor->id_pendonor,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
</p>
<p align="center">
<a href="http://localhost/cdonor/rest_ci_client/index.php/pendonor/create">
    <button>+ Tambah data</button><a>
</p>
</p>