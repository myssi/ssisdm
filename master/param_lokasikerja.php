<?php
include "../include/security.inc.php";
include "../include/conn.php";
include "../include/common.php";
include "../include/variables.php";
$namapt=$_SESSION['namapt'];
$file_css 	= "../plugin/table/all.css";
$nama=$_SESSION['nama'];

?>
<link rel="stylesheet" href="<?php echo $file_css;?>" type="text/css" media="screen" title="no title" />

<script type="text/javascript">
$('document').ready(function(){
	updatestatus();
	scrollalert();
});
function updatestatus(){
	//Show number of loaded items
	var totalItems=$('#content p').length;
	$('#status').text('Loaded '+totalItems+' Items');
}
function scrollalert(){
	var scrolltop=$('#scrollbox').attr('scrollTop');
	var scrollheight=$('#scrollbox').attr('scrollHeight');
	var windowheight=$('#scrollbox').attr('clientHeight');
	var scrolloffset=20;
	if(scrolltop>=(scrollheight-(windowheight+scrolloffset)))
	{
		//fetch new items
		$('#status').text('Loading more items...');
		$.get('new-items.html', '', function(newitems){
			$('#content').append(newitems);
			updatestatus();
		});
	}
	setTimeout('scrollalert();', 1500);
}
</script>
<style type="text/css" >
	#container{ width:1100px; margin:0px auto; padding:40px 0; }
	#scrollbox{ width:1100px; height:500px;  overflow:auto; overflow-x:auto; border:1px solid #f2f2f2; }
	#container > p{ background:#eee; color:#666; font-family:Arial, sans-serif; font-size:0.75em; padding:5px; margin:0; text-align:right;}
</style>
<div id="sub-header">		
	<div class="container">				
		<div class="grid grid_24">
			<h2>Parameter Lokasi Kerja </h2>
		</div> <!-- .grid -->			
	</div> <!-- .container -->
</div> <!-- #sub-header -->
		
	<div id="scrollbox" >
		<div id="content" >
			<table class="data display datatable" width="2000">
	           <thead>
		<tr>
					           <th>Lokasi Kerja </th>
							   <th>Alamat </th>
							   <th>Status </th>
								
								
								
								<th>Edit</th>
								
		</tr>
	</thead>
	<tbody>				
						<?php
					
						
						$view = mysql_query("SELECT * FROM lokasi_kerja order by lokasi");
						while($data=mysql_fetch_array($view))
						{ //view 
						$aktif=$data['aktif'];
						$level=$data['level'];
						if ($aktif==1)
						{
						$status="Aktif";
						}else
						{
						$status="Tidak Aktif";
						}
						?>
		<tr><?php
		if ($level==1)
		{?>
				              <td align="left"><?php echo $data['lokasi_kerja']; ?></td>
		<?php
		} else {?>
		                      <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['lokasi_kerja']; ?></td>
			<?php
		} ?>
		                           <td align="left"><?php echo $data['alamat']; ?></td>	
							   <td align="left"><?php echo $status; ?></td>	
					
								<td align="left">
								<a href="param_lokasikerja_edit.php?width=770&height=430&lokasi_id=<?php echo $data['lokasi_id'];?>&acc=Edit" ><img src="../images/ico/page_edit.png" width="10" height="10">Edit</a>
								</td>
								
         					
								
							
								
		</tr>								
						<?php } ?>			
	</tbody>
   </table>
		</div>
	</div>
	
<img src="../images/ico/table_add.png">
<a href="param_lokasikerja_add.php?acc=Add" title="Tambah Lokasi kerja level 1">Tambah Lokasi kerja level 1</a>
</img><br>
<img src="../images/ico/table_add.png">
<a href="param_lokasikerja_add2.php?acc=Add" title="Tambah Lokasi kerja level 2">Tambah Lokasi kerja level 2</a>
</img>

<script src="<?php echo $file_js;?>"></script>
<script type="text/javascript">	
$(function () { 	
	ReadyMade.init ({ theme: '' });	
});
</script>
 
