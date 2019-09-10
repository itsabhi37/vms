<!-- Essential javascripts for application to work-->
<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
<script src="<?=base_url('assets/js/popper.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/main.js')?>"></script>

<!-- The javascript plugin to display page loading on top-->
<script src="<?=base_url('assets/js/plugins/pace.min.js')?>"></script>

<!-- Page specific javascripts-->
<script src="<?=base_url('assets/js/plugins/chart.js')?>"></script>

<!-- Data table plugin-->
    <script src="<?=base_url('assets/js/plugins/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/js/plugins/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/js/plugins/chart.js')?>"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

<!-- Table export as PDF,Excel,Json,SQL,Word,CSV,PNG -->
<script src="<?=base_url('assets/plugins/tableExport/libs/FileSaver/FileSaver.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/tableExport/libs/js-xlsx/xlsx.core.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/tableExport/libs/jsPDF/jspdf.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/tableExport/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js')?>"></script>
<script src="<?=base_url('assets/plugins/tableExport/libs/html2canvas/html2canvas.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/tableExport/tableExport.min.js')?>"></script>
<!-- END Scripts -->

<!-- IP Mask specific javascripts-->
<script src="<?=base_url('assets/js/jquery.mask.min.js')?>"></script>

<!-- Google analytics script-->
<script type="text/javascript">
    if (document.location.hostname == 'iamabhi.in') {
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
<script>
//Function for Accepting Only Integer Value
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e,spanname) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById(spanname).style.display = ret ? "none" : "inline";
            return ret;
        }
</script>
<!-- Page specific javascripts-->
    <script src="<?=base_url('assets/js/plugins/bootstrap-notify.min.js')?>"></script>
    <script src="<?=base_url('assets/js/plugins/sweetalert.min.js')?>"></script>    

<script type="text/javascript">
function printDiv(){
    var divtoPrint=document.getElementById('mainDivToPrint');
    var popupwindow=window.open('','_blank','width=800,height=400,location=no,left=50px');    
    popupwindow.document.open();
    popupwindow.document.write('<html>');    
    popupwindow.document.write('<head>');   
    popupwindow.document.write('<link href="/vms/assets/css/main.css" rel="stylesheet" type="text/css" />');
    popupwindow.document.write('<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">');
    popupwindow.document.write('</head>');    
    popupwindow.document.write('<body onload="window.print()">'+ divtoPrint.innerHTML +'</body></html>');
    popupwindow.document.close();
}
</script>
</body>
</html>