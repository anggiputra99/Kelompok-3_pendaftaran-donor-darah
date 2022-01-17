<?php echo form_open('pendonor/edit');?>
<?php echo form_hidden('id_pendonor',$datapendonor[0]->id_pendonor);?>

<table border="1" align="center">
<th colspan="2" align="center" white" style="background-color: red">EDIT DATA</th>
    <tr><td>ID PENDONOR</td><td><?php echo form_input('',$datapendonor[0]->id_pendonor,"disabled");?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama',$datapendonor[0]->nama);?></td></tr>
    <tr><td>ALAMAT</td><td><?php echo form_input('alamat',$datapendonor[0]->alamat);?></td></tr>
    <tr><td>TANGGAL LAHIR</td><td><?php echo form_input('tanggal_lahir',$datapendonor[0]->tanggal_lahir);?></td></tr>
    <tr><td>JENIS KELAMIN</td><td><?php echo form_input('jenis_kelamin',$datapendonor[0]->jenis_kelamin);?></td></tr>
    <tr><td width=170px>GOLONGAN DARAH</td><td><?php echo form_input('gol_darah',$datapendonor[0]->gol_darah);?></td></tr>
    <tr><td colspan="2" align="center">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('pendonor','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>