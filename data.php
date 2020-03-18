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
        <th class='negara'><img src='/img/data.png' height='45' width='45'/><br>DATA NEGARA :<br><br>".$negara."</th>
            <th class='kasus'><img src='/img/kasus.png' height='45' width='45'/><br>Total Kasus<br><br>".$total."</th>
            <th class='aktif'><img src='/img/aktif.png' height='45' width='45'/><br>Dalam Penanganan<br><br>".$aktif."</th>
        </tr>
</thead>
<tbody>
    <tr>
    <th class='negara1'><img src='/img/negara.png' height='45' width='45'/><br>Negara<br><br><form>
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
        
        <th class='sembuh'><img src='/img/sembuh.png' height='45' width='45'/><br>Sembuh<br><br>".$sembuh."</th>
        <th class='dead'><img src='/img/mati.png' height='30' width='30'/><br>Meninggal<br><br>".$meninggal."</th>
    </tr>
    <tr>
        <th class='peta' colspan='3'>[PEMETAAN CORONA]<br>Terakhir Cek : <br>" . tgl_indo(date('Y-m-d')) . ' (' . date('H:i:s') . ' WIB)' . "
        <center>";
        echo "<script type='text/javascript'>
function batascheckbox(checkgroup, limit){
    var checkgroup=checkgroup
    var limit=limit
    for (var i=0; i<checkgroup.length; i++){
        checkgroup[i].onclick=function(){
        var checkedcount=0
        for (var i=0; i<checkgroup.length; i++)
            checkedcount+=(checkgroup[i].checked)? 1 : 0
        if (checkedcount>limit){
            this.checked=false
            }
        }
    }
}
</script>
        <form id='pilihan' name='pilihan' action='' method='post'>
        <fieldset>
        <legend>PILIH PETA</legend>
        <input type='checkbox' name='peta' value='jabar'>Jawa Barat</input>
        <input type='checkbox' name='peta' value='jateng'>Jawa Tengah</input>
        <input type='checkbox' name='peta' value='dki'>DKI Jakarta</input>
        <input type='submit' name='submit' value='Lihat Peta!'/>
        </fieldset></form><center>
        <script type='text/javascript'>
batascheckbox(document.forms.pilihan.peta, 1)
</script>";
        if (isset($_POST['peta'])){
            $peta = $_POST['peta'];
            if($peta == 'jabar'){
                echo "- PETA JAWA BARAT -<br><iframe frameborder='0' height='800px' width='800px' title='Data Visualization' allowtransparency='true' allowfullscreen='true' data-v-0b11a7ef='' class='tableauViz' src='https://public.tableau.com/views/PetaSebaranODPPDP-BlueVersion/DashboardMapAllCases?:embed=y&amp;:showVizHome=no&amp;:host_url=https%3A%2F%2Fpublic.tableau.com%2F&amp;:embed_code_version=3&amp;:tabs=no&amp;:toolbar=yes&amp;:animate_transition=yes&amp;:display_static_image=no&amp;:display_spinner=no&amp;:display_overlay=yes&amp;:display_count=yes&amp;publish=yes&amp;:loadOrderID=0'></iframe><br>With ❤ by <a href='https://www.facebook.com/rama.seftiansyah.14'>TheRevolt</a> (2020)";
            }else if($peta == 'dki'){
                echo "- PETA DKI JAKARTA -<br><div class='tableauPlaceholder' id='viz1584371904562' style='position: relative'><noscript><a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Pe&#47;PetaPersebaranTes&#47;Dashboard2&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='PetaPersebaranTes&#47;Dashboard2' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Pe&#47;PetaPersebaranTes&#47;Dashboard2&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='filter' value='amp;:showVizHome=no' /><param name='filter' value='amp;:host_url=https:&#47;&#47;public.tableau.com&#47;' /><param name='filter' value='amp;:embed_code_version=3' /><param name='filter' value='amp;:tabs=no' /><param name='filter' value='amp;:toolbar=yes' /><param name='filter' value='amp;:animate_transition=yes' /><param name='filter' value='amp;:display_static_image=no' /><param name='filter' value='amp;:display_spinner=no' /><param name='filter' value='amp;:display_overlay=yes' /><param name='filter' value='amp;:display_count=yes' /><param name='filter' value='amp;publish=yes' /><param name='filter' value='amp;:loadOrderID=1' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1584371904562');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.width='1000px';vizElement.style.height='827px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='1000px';vizElement.style.height='827px';} else { vizElement.style.width='100%';vizElement.style.height='727px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script><br>With ❤ by <a href='https://www.facebook.com/rama.seftiansyah.14'>TheRevolt</a> (2020)";
            }else if($peta == 'jateng'){
                echo "- PETA JAWA TENGAH -<br><div class='tableauPlaceholder' id='viz1584541507500' style='position: relative'><noscript><a href='https:&#47;&#47;corona.jatengprov.go.id&#47;'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;co&#47;covid19-jateng-1803&#47;covid19-jateng&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='covid19-jateng-1803&#47;covid19-jateng' /><param name='tabs' value='no' /><param name='toolbar' value='no' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;co&#47;covid19-jateng-1803&#47;covid19-jateng&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='filter' value='publish=yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1584541507500');                    var vizElement = divElement.getElementsByTagName('object')[0];                    vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';                    var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script><br>With ❤ by <a href='https://www.facebook.com/rama.seftiansyah.14'>TheRevolt</a> (2020)";
            }
        }else{
                echo "- PETA JAWA BARAT -<br><iframe frameborder='0' height='800px' width='800px' title='Data Visualization' allowtransparency='true' allowfullscreen='true' data-v-0b11a7ef='' class='tableauViz' src='https://public.tableau.com/views/PetaSebaranODPPDP-BlueVersion/DashboardMapAllCases?:embed=y&amp;:showVizHome=no&amp;:host_url=https%3A%2F%2Fpublic.tableau.com%2F&amp;:embed_code_version=3&amp;:tabs=no&amp;:toolbar=yes&amp;:animate_transition=yes&amp;:display_static_image=no&amp;:display_spinner=no&amp;:display_overlay=yes&amp;:display_count=yes&amp;publish=yes&amp;:loadOrderID=0'></iframe><br><br>With ❤ by <a href='https://www.facebook.com/rama.seftiansyah.14'>TheRevolt</a> (2020)";
            };
    echo"</th></tr>
    </table>";
}else{
    echo "<table cellspacing='5'>
<thead>
        <tr>
        <th class='negara'><img src='/img/data.png' height='45' width='45'/><br>COUNTRY :<br><br>".$negara."</th>
        <th class='kasus'><img src='/img/kasus.png' height='45' width='45'/><br>Total Kasus<br><br>".$total."</th>
        <th class='aktif'><img src='/img/aktif.png' height='45' width='45'/><br>Dalam Penanganan<br><br>".$aktif."</th>
    </tr>
</thead>
<tbody>
<tr>
<th class='negara1'><img src='/img/negara.png' height='45' width='45'/><br>Negara<br><br><form>
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
    <th class='sembuh'><img src='/img/sembuh.png' height='45' width='45'/><br>Sembuh<br><br>".$sembuh."</th>
    <th class='dead'><img src='/img/mati.png' height='45' width='45'/><br>Meninggal<br><br>".$meninggal."</th>
</tr>
<tr>
        <th class='peta' colspan='3'>[GRAPHIC CORONA GLOBAL]<br>LAST CHECKED : <br>" . tgl_indo(date('Y-m-d')) . ' (' . date('H:i:s') . ' WIB)' . "<br><img src='https://covid19.mathdro.id/api/og' heigh='1000px' width='800px'></img><br>With ❤ by <a href='https://www.facebook.com/rama.seftiansyah.14>TheRevolt</a> (2020)";
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
