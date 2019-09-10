<?php include_once('common/header.php');?>

<?php include_once('common/menu.php');?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">dashboard</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Visitors</h4>
                    <p><b><?php if(isset($totalVist)){ echo $totalVist;} ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-desktop fa-3x"></i>
                <div class="info">
                    <h4>Computers</h4>
                    <p><b><?php if(isset($totalPcs)){ echo $totalPcs;} ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-laptop fa-3x"></i>
                <div class="info">
                    <h4>Laptops</h4>
                    <p><b><?php if(isset($totalLaps)){ echo $totalLaps;} ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-user-secret fa-3x"></i>
                <div class="info">
                    <h4>Admin</h4>
                    <p><b><?php if(isset($totalAdmn)){ echo $totalAdmn;} ?></b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Monthly Report</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">PC's Availability Status</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include_once('common/footer.php');?>
<script type="text/javascript">
    var data = {
        labels: ["January", "February", "March", "April", "May","June","July","August","September","October","November","December"],
        datasets: [{
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                        <?php echo $bkdpclog[0]->Jan; ?>,
                        <?php echo $bkdpclog[0]->Feb; ?>,
                        <?php echo $bkdpclog[0]->Mar; ?>,
                        <?php echo $bkdpclog[0]->Apr; ?>,
                        <?php echo $bkdpclog[0]->May; ?>,
                        <?php echo $bkdpclog[0]->Jun; ?>,
                        <?php echo $bkdpclog[0]->Jul; ?>,
                        <?php echo $bkdpclog[0]->Aug; ?>,
                        <?php echo $bkdpclog[0]->Sep; ?>,
                        <?php echo $bkdpclog[0]->Oct; ?>,
                        <?php echo $bkdpclog[0]->Nov; ?>,
                        <?php echo $bkdpclog[0]->Dec; ?>
                      ]
            }
        ]
    };
    var pdata = [{
            value: <?php echo $allPcs=$allPcs-$totalBookedpc; ?>,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Available for Booking"
        },
        {
            value: <?php echo $totalBookedpc; ?>,
            color: "#F7464A",
            highlight: "#FF5A5E",
            label: "In-Use"
        }
    ]

    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
    var pieChart = new Chart(ctxp).Pie(pdata);
</script>
