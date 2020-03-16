<?php
function ambil($n){
    if(isset($_GET["negara"])){
        $negara = $_GET["negara"];
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
        <th colspan='3'>[PEMETAAN CORONA]<br>Terakhir Cek : <br>" . tgl_indo(date('Y-m-d')) . ' (' . date('H:i:s') . ' WIB)' . "
        <form action='' method='post'>
        <fieldset>
        <legend>PILIH PETA</legend>
        <input type='checkbox' name='peta' value='jabar'>Jawa Barat</input>
        <input type='checkbox' name='peta' value='dki'>DKI Jakarta</input>
        <input type='submit' name='submit' value='Lihat Peta!'/>
        </fieldset></form>";
        if (isset($_POST['peta'])){
            $peta = $_POST['peta'];
            if($peta == 'jabar'){
                echo "<iframe frameborder='0' height='800px' width='800px' title='Data Visualization' allowtransparency='true' allowfullscreen='true' data-v-0b11a7ef='' class='tableauViz' src='https://public.tableau.com/views/PetaSebaranODPPDP-BlueVersion/DashboardMapAllCases?:embed=y&amp;:showVizHome=no&amp;:host_url=https%3A%2F%2Fpublic.tableau.com%2F&amp;:embed_code_version=3&amp;:tabs=no&amp;:toolbar=yes&amp;:animate_transition=yes&amp;:display_static_image=no&amp;:display_spinner=no&amp;:display_overlay=yes&amp;:display_count=yes&amp;publish=yes&amp;:loadOrderID=0'></iframe><br>With ❤ by TheRevolt (2020)";
            }else if($peta == 'dki'){
                echo "<div class='tableauPlaceholder' id='viz1584371904562' style='position: relative'><noscript><a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Pe&#47;PetaPersebaranTes&#47;Dashboard2&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='PetaPersebaranTes&#47;Dashboard2' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Pe&#47;PetaPersebaranTes&#47;Dashboard2&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='filter' value='amp;:showVizHome=no' /><param name='filter' value='amp;:host_url=https:&#47;&#47;public.tableau.com&#47;' /><param name='filter' value='amp;:embed_code_version=3' /><param name='filter' value='amp;:tabs=no' /><param name='filter' value='amp;:toolbar=yes' /><param name='filter' value='amp;:animate_transition=yes' /><param name='filter' value='amp;:display_static_image=no' /><param name='filter' value='amp;:display_spinner=no' /><param name='filter' value='amp;:display_overlay=yes' /><param name='filter' value='amp;:display_count=yes' /><param name='filter' value='amp;publish=yes' /><param name='filter' value='amp;:loadOrderID=1' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1584371904562');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.width='1000px';vizElement.style.height='827px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='1000px';vizElement.style.height='827px';} else { vizElement.style.width='100%';vizElement.style.height='727px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script><br>With ❤ by TheRevolt (2020)";
            }
        }else{
                echo "<iframe frameborder='0' height='800px' width='800px' title='Data Visualization' allowtransparency='true' allowfullscreen='true' data-v-0b11a7ef='' class='tableauViz' src='https://public.tableau.com/views/PetaSebaranODPPDP-BlueVersion/DashboardMapAllCases?:embed=y&amp;:showVizHome=no&amp;:host_url=https%3A%2F%2Fpublic.tableau.com%2F&amp;:embed_code_version=3&amp;:tabs=no&amp;:toolbar=yes&amp;:animate_transition=yes&amp;:display_static_image=no&amp;:display_spinner=no&amp;:display_overlay=yes&amp;:display_count=yes&amp;publish=yes&amp;:loadOrderID=0'></iframe><br>With ❤ by TheRevolt (2020)";
            };
    echo"</th></tr>
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
<tr>
        <th colspan='3'>[GRAPHIC CORONA GLOBAL]<br>LAST CHECKED : <br>" . tgl_indo(date('Y-m-d')) . ' (' . date('H:i:s') . ' WIB)' . "<br><img src='https://covid19.mathdro.id/api/og' heigh='1000px' width='800px'></img><br>With ❤ by TheRevolt (2020)";
    echo"</th></tr>
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