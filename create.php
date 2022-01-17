<?php echo form_open_multipart('pendonor/create');?>
<table border="1" align="center">
    <tr>
    <th colspan="2" align="center" style="background-color: red">TAMBAH DATA</th>
    </tr>
    <tr><td>ID PENDONOR</td><td><?php echo form_input('id_pendonor');?></td></tr>
    <tr><td>NAMA </td><td><?php echo form_input('nama');?></td></tr>
    <tr><td>ALAMAT </td><td><?php echo form_input('alamat');?></td></tr>
    <tr><td>TANGGAL LAHIR </td><td><?php echo form_input('tanggal_lahir');?></td></tr>
    <tr><td>JENIS KELAMIN </td><td><?php echo form_input('jenis_kelamin');?></td></tr>
    <tr><td width=170px>GOLONGAN DARAH </td><td><?php echo form_input('gol_darah');?></td></tr>
    <tr><td colspan="2" align="center">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('pendonor','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>