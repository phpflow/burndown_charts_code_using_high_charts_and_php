<?php
$actualArray = array(0, 1, 1,1,4);

$idealArray = range(0, 10, 1);
$idealXArray = array();
foreach ($idealArray as $value){
    $value = trim($value);
    $idealXArray[] = 'Day '.$value;
}
?>  

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<title>phpflow.com : Demo of  Burndown charts</title>
<?php include('../container.php');?>
<div><h3>Demo : Burndown charts with highcharts</h1></div>

<div id="container-burndown" style="max-width: 510px; height: 400px;"></div>
<?php include('../footer.php');?>
<script>
jQuery(document).ready(function() {
var doc = $(document);
$('#container-burndown').highcharts({
    title: {
      text: 'Burndown Chart of Project',
      x: -10 //center
    },
	scrollbar: {
                barBackgroundColor: 'gray',
                barBorderRadius: 7,
                barBorderWidth: 0,
                buttonBackgroundColor: 'gray',
                buttonBorderWidth: 0,
                buttonBorderRadius: 7,
                trackBackgroundColor: 'none',
                trackBorderWidth: 1,
                trackBorderRadius: 8,
                trackBorderColor: '#CCC'
            },
    colors: ['blue', 'red'],
    plotOptions: {
      line: {
        lineWidth: 3
      },
      tooltip: {
        hideDelay: 200
      }
    },
    subtitle: {
      text: 'All Project Team Summary',
      x: -10
    },
    xAxis: {
      categories: <?php echo json_encode($idealXArray);?>
    },
    yAxis: {
      title: {
        text: 'Remaining work (days)'
		
      },
			 type: 'linear',
			 max:10,
			 min:0,
			 tickInterval :1
	 
    },
	
    tooltip: {
      valueSuffix: ' day',
      crosshairs: true,
      shared: true
    },
    legend: {
     layout: 'horizontal',
      align: 'center',
      verticalAlign: 'bottom',
      borderWidth: 0
    },
    series: [{
      name: 'Ideal Burn',
      color: 'rgba(255,0,0,0.25)',
      lineWidth: 2,
	  
      data: <?php echo json_encode(array_reverse($idealArray));?>
    }, {
      name: 'Actual Burn',
      color: 'rgba(0,120,200,0.75)',
      marker: {
        radius: 6
      },
      data: <?php echo json_encode($actualArray);?>
    }]
  });
    });
</script>
