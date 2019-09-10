<?php
if(isset($vistpf)){
    ?>
    <div class="table-responsive" id="mainDivToPrint">
	<table class="table table-striped table-bordered" >												
		<tbody>
            <tr>
			    <td colspan="5" style="font-weight:bold;font-size:18px" align="center">Visitor's Profile</td>
			</tr>
		    <tr>
			    <td style="font-weight:bold;" align="right">User Name :</td>
				<td colspan="3" align="left"><?php echo $vistpf->uname; ?></td>
				<td rowspan="3" align="center"><img src="<?= $vistpf->image?>" class="img-square" width="100" alt="Image"></td>		
			</tr>
			<tr>
			    <td style="font-weight:bold;" align="right">Visitor Name :</td>
				<td colspan="3" align="left"><?php echo $vistpf->name; ?></td>	
			</tr> 
			<tr>
				<td style="font-weight:bold;" align="right">Designation :</td>
				<td colspan="3" align="left"><?php echo $vistpf->designation; ?></td>				
			</tr>
			<tr>
				<td style="font-weight:bold;" align="right">Department :</td>
				<td colspan="4" align="left"><?php echo $vistpf->department; ?></td>  
			</tr>
            <tr>                
                <td style="font-weight:bold;" align="right">Mobile No. :</td>
				<td colspan="2" align="left"><?php  echo $vistpf->mobile; ?></td>
                <td style="font-weight:bold;" align="right">Gender :</td>
				<td align="left"><?php echo $vistpf->gender; ?></td>
            </tr>
            <tr>
				<td style="font-weight:bold;" align="right">Email Id :</td>
				<td colspan="4" align="left"><?php  echo $vistpf->email; ?></td>
			</tr>
		</tbody>
	</table>												
												
</div>
<div align="center"><a href="<?= $vistpf->poi?>" class="btn btn-outline-info" target="_blank">Download Proof of Identity</a> </div>

    <?php
}
?>
