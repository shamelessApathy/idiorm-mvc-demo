<?php
require_once(HEADER);
?>

<div class='container'>
	<h4>Payout Area</h4>
	<div class='row'>
		<div class='col-md-6'>
		<h5>Subscription Downloaded Images Payout Schema</h5>
		<p><sub>Image pricing for Subscription Downloads changes based on the price per image</sub>
		<p><sub>calculated by dividing the subscription price by how many images come with it</sub></p>
			<table class='payout-table`'>
				<col style='width:15%;'>
				<col style='width:25%;'>
				<col style='width:25%;'>
				<col style='width:25%;'>
				<thead>
				<th class='payout-heading'>Tier</th>
				<th class='payout-heading'>Price per Image</th>
				<th class='payout-heading'>Sharefuly Fee</th>
				<th class='payout-heading'>Payout</th>
				</thead>
				<tbody>
					<tr>
						<td>GOLD</td>
						<td>$1.00</td>
						<td>10% = 10 cents</td>
						<td>$0.90</td>
					</tr>
					<tr>
						<td>SILVER</td>
						<td>$1.20</td>
						<td>10% = 12 cents</td>
						<td>$1.08</td>
					</tr>
					<tr>
						<td>BRONZE</td>
						<td>$1.50</td>
						<td>10% = 15 cents</td>
						<td>$1.35</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class='col-md-6'>
		<h5>Payout for Single Purchase</h5>
		<p><sub>For single purchases the price will be determined by whether or not it is regular priced</sub></p>
		<p><sub>or the owner has set a premium price</sub></p>
				<table class='payout-table`'>
				<col style='width:15%;'>
				<col style='width:25%;'>
				<col style='width:25%;'>
				<col style='width:25%;'>
				<thead>
				<th class='payout-heading'>Tier</th>
				<th class='payout-heading'>Price per Image</th>
				<th class='payout-heading'>Sharefuly Fee</th>
				<th class='payout-heading'>Payout</th>
				</thead>
				<tbody>
					<tr>
						<td>Regular</td>
						<td>$5.00</td>
						<td>10% = 50 cents</td>
						<td>$4.50</td>
					</tr>
					<tr>
						<td>Premium</td>
						<td>Premium Price (P)</td>
						<td>10% of (P)</td>
						<td>(P) - 10%</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
require_once(HTML_FOOTER);
require_once(FOOTER);
?>