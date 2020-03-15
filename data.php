<?php
function ambil($n){
if(isset($_GET['negara'])){
    $negara = $_GET['negara'];
}else{
    $negara = 'Indonesia';
};
$data = file_get_contents("https://api.teainside.org/corona/?country=" . $negara);
$json = json_decode($data, TRUE);
date_default_timezone_set('Asia/Jakarta');
$total = $json['cmt'];
$sembuh = $json['sdt'];
$meninggal = $json['fst'];
$aktif = $total - $sembuh - $meninggal;

if($negara == 'Indonesia'){
echo "<table cellspacing='5'>
<thead>
        <tr>
            <th><img src='/img/negara.png' height='25' width='25'/><br>Negara<br><br><form>
            <select name='negara' onchange='this.form.submit()'>
            <option value='' disabled selected>Pilih Negara</option>
            <option value='Indonesia'>Indonesia</option>
            <option value='USA'>Amerika</option>
            <option value='China'>China</option>
            <option value='Italy'>Italy</option>
            <option value='S. Korea'>S. Korea</option>
            <option value='Germany'>Germany</option>
            <option value='France'>France</option>
            <option value='Switzerland'>Switzerland</option>
            <option value='UK'>UK</option>
            <option value='Netherlands'>Netherlands</option>
            <option value='Sweden'>Sweden</option>
            <option value='Belgium'>Belgium</option>
            <option value='Denmark'>Denmark</option>
            <option value='Japan'>Japan</option>
            <option value='Austria'>Austria</option>
            <option value='Diamond Princess'>Diamond Princess</option>
            <option value='Malaysia'>Malaysia</option>
            <option value='Qatar'>Qatar</option>
            <option value='Australia'>Australia</option>
            <option value='Canada'>Canada</option>
            <option value='Portugal'>Portugal</option>
            <option value='Finland'>Finland</option>
            <option value='Czechia'>Czechia</option>
            <option value='Greece'>Greece</option>
            <option value='Bahrain'>Bahrain</option>
            <option value='Singapore'>Singapore</option>
            <option value='Israel'>Israel</option>
            <option value='Slovenia'>Slovenia</option>
            <option value='Iceland'>Iceland</option>
            <option value='Hong Kong'>Hong Kong</option>
            <option value='Philippines'>Philippines</option>
            <option value='Estonia'>Estonia</option>
            <option value='Romania'>Romania</option>
            <option value='Ireland'>Ireland</option>
            <option value='Brazil'>Brazil</option>
            <option value='Thailand'>Thailand</option>
            <option value='Kuwait'>Kuwait</option>
            <option value='Poland'>Poland</option>
            <option value='Iraq'>Iraq</option>
            <option value='Egypt'>Egypt</option>
            <option value='India'>India</option>
            <option value='Saudi Arabia'>Saudi Arabia</option>
            <option value='San Marino'>San Marino</option>
            <option value='Lebanon'>Lebanon</option>
            <option value='UAE'>UAE</option>
            <option value='Chile'>Chile</option>
            <option value='Luxembourg'>Luxembourg</option>
            <option value='Taiwan'>Taiwan</option>
            <option value='Russia'>Russia</option>
        </select>
        </form></th>
            <th><img src='/img/kasus.png' height='25' width='25'/><br>Total Kasus<br><br>".$total."</th>
            <th><img src='/img/aktif.png' height='25' width='25'/><br>Dalam Penanganan<br><br>".$aktif."</th>
        </tr>
</thead>
<tbody>
    <tr>
        <th> DATA NEGARA :<br><br>".$negara."</th>
        <th><img src='/img/sembuh.png' height='25' width='25'/><br>Sembuh<br><br>".$sembuh."</th>
        <th><img src='/img/mati.png' height='30' width='30'/><br>Meninggal<br><br>".$meninggal."</th>
    </tr>
    <tr>
        <th colspan='3'>PETA PANTAUAN JAWA BARAT<br>TERAKHIR CEK :<br>" . tgl_indo(date('Y-m-d')) . ' (' . date('H:i:s') . ' WIB)' . "<br><br><iframe frameborder='0' height='800px' width='800px' title='Data Visualization' allowtransparency='true' allowfullscreen='true' data-v-0b11a7ef='' class='tableauViz' src='https://public.tableau.com/views/PetaSebaranODPPDP-BlueVersion/DashboardMapAllCases?:embed=y&amp;:showVizHome=no&amp;:host_url=https%3A%2F%2Fpublic.tableau.com%2F&amp;:embed_code_version=3&amp;:tabs=no&amp;:toolbar=yes&amp;:animate_transition=yes&amp;:display_static_image=no&amp;:display_spinner=no&amp;:display_overlay=yes&amp;:display_count=yes&amp;publish=yes&amp;:loadOrderID=0'></iframe><br>With ❤ by TheRevolt (2020)</th>
    </tr>
    </table>";
}else{
    echo "<table cellspacing='5'>
<thead>
        <tr>
            <th><img src='/img/negara.png' height='25' width='25'/><br>Negara<br><br><form>
            <select name='negara' onchange='this.form.submit()'>
            <option value='' disabled selected>Pilih Negara</option>
            <option value='Indonesia'>Indonesia</option>
            <option value='USA'>Amerika</option>
            <option value='China'>China</option>
            <option value='Italy'>Italy</option>
            <option value='S. Korea'>S. Korea</option>
            <option value='Germany'>Germany</option>
            <option value='France'>France</option>
            <option value='Switzerland'>Switzerland</option>
            <option value='UK'>UK</option>
            <option value='Netherlands'>Netherlands</option>
            <option value='Sweden'>Sweden</option>
            <option value='Belgium'>Belgium</option>
            <option value='Denmark'>Denmark</option>
            <option value='Japan'>Japan</option>
            <option value='Austria'>Austria</option>
            <option value='Diamond Princess'>Diamond Princess</option>
            <option value='Malaysia'>Malaysia</option>
            <option value='Qatar'>Qatar</option>
            <option value='Australia'>Australia</option>
            <option value='Canada'>Canada</option>
            <option value='Portugal'>Portugal</option>
            <option value='Finland'>Finland</option>
            <option value='Czechia'>Czechia</option>
            <option value='Greece'>Greece</option>
            <option value='Bahrain'>Bahrain</option>
            <option value='Singapore'>Singapore</option>
            <option value='Israel'>Israel</option>
            <option value='Slovenia'>Slovenia</option>
            <option value='Iceland'>Iceland</option>
            <option value='Hong Kong'>Hong Kong</option>
            <option value='Philippines'>Philippines</option>
            <option value='Estonia'>Estonia</option>
            <option value='Romania'>Romania</option>
            <option value='Ireland'>Ireland</option>
            <option value='Brazil'>Brazil</option>
            <option value='Thailand'>Thailand</option>
            <option value='Kuwait'>Kuwait</option>
            <option value='Poland'>Poland</option>
            <option value='Iraq'>Iraq</option>
            <option value='Egypt'>Egypt</option>
            <option value='India'>India</option>
            <option value='Saudi Arabia'>Saudi Arabia</option>
            <option value='San Marino'>San Marino</option>
            <option value='Lebanon'>Lebanon</option>
            <option value='UAE'>UAE</option>
            <option value='Chile'>Chile</option>
            <option value='Luxembourg'>Luxembourg</option>
            <option value='Taiwan'>Taiwan</option>
            <option value='Russia'>Russia</option>
        </select>
        </form></th>
        <th><img src='/img/kasus.png' height='25' width='25'/><br>Total Kasus<br><br>".$total."</th>
        <th><img src='/img/aktif.png' height='25' width='25'/><br>Dalam Penanganan<br><br>".$aktif."</th>
    </tr>
</thead>
<tbody>
<tr>
    <th> DATA NEGARA :<br><br>".$negara."</th>
    <th><img src='/img/sembuh.png' height='25' width='25'/><br>Sembuh<br><br>".$sembuh."</th>
    <th><img src='/img/mati.png' height='30' width='30'/><br>Meninggal<br><br>".$meninggal."</th>
</tr>
        <th colspan='3'>[GRAPHIC CORONA GLOBAL]<br>LAST CHECKED : <br>" . tgl_indo(date('Y-m-d')) . ' (' . date('H:i:s') . ' WIB)' . "<br><img src='https://covid19.mathdro.id/api/og' heigh='1000px' width='800px></img></th>
    </tr>
    <tr>
            <th colspan='3'><br>With ❤ by TheRevolt (2020)";
            echo"</tbody>
            </tr>
    </table>";
};
}
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>