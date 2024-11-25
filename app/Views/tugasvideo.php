<!DOCTYPE html>
<html>
<h3> Tambah Data</h3>

<form action="" method="POST">
<table>
    <tr>
        <td width="120">Nama</td>
        <td><input type="text"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password"></td>
    </tr>
    <tr>
        <td>ID Pegawai</td>
        <td><input type="number"></td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td><input type="date"></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
            <td><input type="radio" name="jk"> Laki-laki
                <input type="radio" name="jk"> Perempuan
        </td>
    </tr>
    <tr>
        <td>Hobi</td>
            <td><input type="checkbox" name="jk"> Berenang
                <input type="checkbox" name="jk"> Menyanyi
        </td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td><select>
            <option>Direktur</option>
            <option>Staf</option>
        </select>
        </td>
    </tr>
<tr>
    <td>Alamat</td>
    <td><textarea></textarea></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="Simpan">
        <input type="reset" value="Reset">
        <input type="button" value="Kembali">

    </td>
</tr>

</table>    


</form>