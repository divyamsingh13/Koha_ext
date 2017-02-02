<?php
/**
 * Chart interface of a particular respondent
 */
?>
	<!--Load the AJAX API-->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
		// Load the Visualization API and the corechart package
		google.charts.load('current', {'packages': ['corechart', 'bar']});

		// Set a callback to run when the Google Visualization API is loaded
		google.charts.setOnLoadCallback(drawCharts);
		
		// Callback that creates and populates a data table,
		// instantiates the chart, passes in the data and draws it.
		function drawCharts()
		{
			drawTestChart();
			drawPieChart();
			drawBarChart();
		}


		// Test chart
		function drawTestChart()
		{
			// Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Security');
			data.addColumn('number', 'Percent');
			data.addColumn({type:'string', 'role': 'style'});

			data.addRows([
			<?php
				// Populate asset values into chart
				$eq_colors = array('2d862d','339933','39ac39','40bf40','53c653','66cc66','79d279','8cd98c','9fdf9f','b3e6b3','c6ecc6','d9f2d9','ecf9ec','ffffff');
				$fi_colors = array('003399','003cb3','0044cc','004de6','0055ff','1a66ff','3377ff','4d88ff','6699ff','80aaff','99bbff','b3ccff','ccddff','e6eeff','ffffff');
				$eq_counter = 0;
				$fi_counter = 1;

				$items = array();
				foreach ($data['recommended_securities_info'] as $sec) {
				if ($sec->asset_type == 'eq'){
					if ($eq_counter <=12){
					$color = $eq_colors[$eq_counter];
					$eq_counter = $eq_counter + 1;
					}
					else {$color = 'ffffff';
					}
				}					
				elseif ($sec->asset_type == 'fi'){
				$color = 'ffffff';
				}
				else {
				$color = 'ffffff';
				}
				$color = 'color:#003399';

				$items[] = '["'.($sec->percentage*100).'% - ' . $sec->sec_name . ' (' . $sec->ticker . ')", ' . $sec->percentage . ','.$color.']';
				
				}
				$item_str = implode(',', $items);
				echo $item_str;
			?>
			]);
			
			// Set chart options
			var options = {'title': 'Security portfolio',
				'width': 700, 'height': 600, 'chartArea': {'width': "100%", 'height': "60%"}, 'legend': {'textStyle':{'fontSize': 10}}};
				
			// Instantiate and draw our chart, passing in some options
			var chart = new google.visualization.PieChart(document.getElementById('test_chart_div'));
			chart.draw(data, options);
		}
		

		// Pie chart
		function drawPieChart()
		{
			// Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Asset');
			data.addColumn('number', 'Percent');
			data.addRows([
			<?php
				// Populate asset values into chart
				$items = array();
				foreach ($data['securities_info'] as $sec) {
					$items[] = '["' . $sec->category . '-' . $sec->family . '", ' . $sec->existing . ']';
				}
				$item_str = implode(',', $items);
				echo $item_str;
			?>
			]);
			
			// Set chart options
			var options = {'title': 'Asset portfolio',
				'width': 500, 'height': 400, 'chartArea': {'width': "90%", 'height': "80%"}};
				
			// Instantiate and draw our chart, passing in some options
			var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
			chart.draw(data, options);
		}
		
		// Bar chart
		function drawBarChart()
		{
			var data = google.visualization.arrayToDataTable([
				['Category', 'Recommended', 'Existing'],
			<?php
				// Populate asset values into chart
				$items = array();
				foreach ($data['securities_info'] as $sec) {
					$items[] = '["' . $sec->category . '", ' . $sec->recommended . ', ' . $sec->existing . ']';
				}
				$item_str = implode(',', $items);
				echo $item_str;
			?>
			]);
			
			var options = {title: 'Asset portfolio', width: 500, height: 400, 'chartArea': {'width': "60%", 'height': "80%"}, hAxis: {title: 'Percentage', minValue: 0}, vAxis: {title: 'Category'}};
			
			var chart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));
			chart.draw(data, options);
		}
		
		function select_all(class_name, checked)
		{
			if (checked) {
				$('.' + class_name).each(function() {
					this.checked = true;
				});
			} else {
				$('.' + class_name).each(function() {
					this.checked = false;
				});
			}
		}
		
    </script>
<h3>Recommend portfolio for <?php echo $data['respondent_info']->first_name ?> <?php echo $data['respondent_info']->last_name?></h3>
<p>
	<?php
		$pydump = exec("/usr/bin/python /var/www/html/smvc/app/views/user/optimal_portfolio_d.py ".$data['respondent_info']->client_id." ".$data['respondent_info']->email);
		//echo $pydump;

		print_r($data['recommended_securities_info']);
		print_r($data['recommended_alloc_info']);
		print_r($data['recommended_stats_info']);


	?>	
<div class="row">
	<div class="col-sm-6" id="test_chart_div" style="width: 70%; "></div>
	<div class="col-sm-6" id="pie_chart_div"></div>
	<div class="col-sm-2">
		<div>
			<input checked="checked" type="checkbox" onclick="select_all('chk_categories', this.checked)"> <strong>Asset categories</strong>
		</div>
		<div style="overflow: auto; height: 400px;">
	<?php
		foreach ($data['security_categories'] as $cat) {
			echo '<input class="chk_categories" checked="checked" type="checkbox"> ' . $cat->category . '<br>';
		}
	?>
		</div>
	</div>
	<div class="col-sm-2">
		<div>
			<input checked="checked" type="checkbox" onclick="select_all('chk_families', this.checked)"> <strong>Fund families</strong>
		</div>
		<div style="overflow: auto; height: 400px;">
	<?php
		foreach ($data['security_families'] as $fam) {
			echo '<input class="chk_families" checked="checked" type="checkbox"> ' . $fam->family . '<br>';
		}
	?>
		</div>
	</div>
	<div class="col-sm-2" style="overflow: auto; height: 400px;">
		<h6>Specific securities</h6>
		<form method="post">
			<input type="hidden" name="form_type" value="ticker">
			<div style="margin-bottom:3px;"><span>Ticker</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>Percentage</span></div>
	<?php
		$i = 0;
		foreach ($data['holdings_info'] as $holding) {
			echo '<div style="margin-bottom:3px;"><input size="5" onfocus="add_new_row(' . $i . ')" id="ticker_order_' . $i . '" type="text" name="ticker' . $i . '" value="' . $holding->ticker . '"> <input size="3" type="text" name="share' . $i . '" value="' . $holding->percentage . '"></div>';
			$i++;
		}
	?>
			<div><input type="submit" name="act" value="Save"></div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
	<table class="table table-striped">
		<thead>
			<tr>
				<td>&nbsp;</td>
				<td>Recommended</td>
				<td>Existing</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Expected Anual return</td>
				<td>50%</td>
				<td>50%</td>
			</tr>
			<tr>
				<td>Expected standard deviation</td>
				<td>50%</td>
				<td>50%</td>
			</tr>
			<tr>
				<td>Expense ratio</td>
				<td>50%</td>
				<td>50%</td>
			</tr>
		</tbody>
	</table>
	</div>
	<div class="col-sm-6" id="bar_chart_div"></div>
</div>
<?php echo $data['respondent_info']->email;?>
