    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered exportopdf" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Mobile</th>
                                <th style="text-align:center;">Check Me</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($visitors)):?>
                            <?php $sln=0; foreach($visitors as $vst):$sln=$sln+1; ?>
                            <tr>
                                <td>
                                    <?php echo $sln;?>
                                </td>
                                <td>
                                    <?php echo $vst->name;?>
                                </td>
                                <td>
                                    <?php echo $vst->uname;?>
                                </td>
                                <td>
                                    <?php echo $vst->designation;?>
                                </td>
                                <td>
                                    <?php echo $vst->department;?>
                                </td>
                                <td>
                                    <?php echo $vst->mobile;?>
                                </td>
                                <td align="center">
                                <div class="animated-checkbox">
                                  <label>
                                    <input type="checkbox" name="" class="uname_cbx" data-user-name="<?php echo $vst->uname;?>"><span class="label-text"></span>
                                  </label>
                                </div>
                                </td>
                                <!--<td>
                                    <input type="checkbox" name="" class="uname_cbx" data-user-name="<?php echo $vst->uname;?>">
                                </td>-->
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Data table plugin-->
    <script src="<?=base_url('assets/js/plugins/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/js/plugins/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/js/plugins/chart.js')?>"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>