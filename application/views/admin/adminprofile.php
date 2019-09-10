<?php
if(isset($admpf)){
    ?>
    <div class="table-responsive" id="mainDivToPrint">
	<table class="table table-striped table-bordered" >												
		<tbody>
            <tr>
			    <td colspan="5" style="font-weight:bold;font-size:18px" align="center">Admin's Profile</td>
			</tr>
		    <tr>
			    <td style="font-weight:bold;" align="right">User Name :</td>
				<td colspan="3" align="left"><?php echo $admpf->uname; ?></td>
				<td rowspan="3" align="center"><img src="<?= $admpf->image?>" class="img-square" width="100" alt="Image"></td>		
			</tr>
			<tr>
			    <td style="font-weight:bold;" align="right">Admin Name :</td>
				<td colspan="3" align="left"><?php echo $admpf->name; ?></td>	
			</tr> 
			<tr>
				<td style="font-weight:bold;" align="right">Designation :</td>
				<td colspan="3" align="left"><?php echo $admpf->designation; ?></td>				
			</tr>
			<tr>
				<td style="font-weight:bold;" align="right">Department :</td>
				<td colspan="4" align="left"><?php echo $admpf->department; ?></td>  
			</tr>
            <tr>                
                <td style="font-weight:bold;" align="right">Mobile No. :</td>
				<td colspan="2" align="left"><?php  echo $admpf->mobile; ?></td>
                <td style="font-weight:bold;" align="right">Gender :</td>
				<td align="left"><?php echo $admpf->gender; ?></td>
            </tr>
            <tr>
				<td style="font-weight:bold;" align="right">Email Id :</td>
				<td colspan="4" align="left"><?php  echo $admpf->email; ?></td>
			</tr>
		</tbody>
	</table>												
												
</div>

    <?php
}
?>
