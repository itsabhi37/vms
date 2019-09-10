<?php include_once('common/header.php');?>

<?php include_once('common/menu.php');?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Reports</h1>
            <p>Showing all System or Pc Booking Details Section...</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?=base_url('reports')?>">Reports</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="btn-group pull-right" role="group">
                        <button class="btn btn-primary btn-sm dropdown-toggle" id="btnGroupDrop4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-align-justify"></i>Export to</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" onclick="exportTableAs('exportopdf','xls');"><b><i class="fa fa-file-excel-o"></i></b>XLS</a>
                            <a class="dropdown-item" href="#" onclick="exportTableAs('exportopdf','pdf');"><b><i class="fa fa-file-pdf-o"></i></b>PDF</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered exportopdf" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>User Name</th>
                                <th>Name</th>
                                <th>IP Address</th>
                                <th>Network Type</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($rpt)):?>
                            <?php $sln=0; foreach($rpt as $rpts):$sln=$sln+1; ?>
                            <tr>
                                <td>
                                    <?php echo $sln;?>
                                </td>
                                <td>
                                    <?php echo $rpts->uname;?>
                                </td>
                                <td>
                                    <?php echo $rpts->name;?>
                                </td>
                                <td>
                                    <?php echo $rpts->ip;?>
                                </td>
                                <td>
                                    <?php echo $rpts->networktype;?>
                                </td>
                                <td>
                                    <?php echo $newDate = date("d-m-Y", strtotime($rpts->date)); ?>
                                </td>
                                <td>
                                    <?php echo date('h:i:s A', strtotime($rpts->time_from)); ?>
                                </td>
                                <td>
                                    <?php echo date('h:i:s A', strtotime($rpts->time_to)); ?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once('common/footer.php');?>
<script type="text/javascript">
    function exportTableAs(tableClass, exportType) {
        $("table." + tableClass).tableExport({
            type: exportType
        });
    }
</script>