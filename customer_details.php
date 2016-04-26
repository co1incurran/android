<?php
define("DB_HOST", "127.0.0.1");
define("DB_USER", "user");
define("DB_PASSWORD", "1234");
define("DB_DATABASE", "enable_supplies_db");
 
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

$customerid = $_GET['customerid'];
$customerid = mysqli_real_escape_string($con ,$customerid);
$sql = "SELECT * FROM customer WHERE customerid ='$customerid' ; ";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
	array_push($result,
		array('customer id'=>$row[0],
		'name_prefix'=>$row[1],
		'first_name'=>$row[2],
		'last_name'=>$row[3],
		'phone_num'=>$row[4],
		'mobile_phone_num'=>$row[5],
		'email'=>$row[6],
		'fax'=>$row[7],
		'address_line1'=>$row[8],
		'address_line2'=>$row[9],
		'address_line3'=>$row[10],
		'address_line4'=>$row[11],
		'county'=>$row[12],
		'country'=>$row[13],
		'last_contacted'=>$row[14],
		'pref_contact_type'=>$row[15],
		'sage_id'=>$row[16]
	));
}
/*
echo '<ul id="contacts" class="listing list-view clearfix">';

		foreach ($result as $results){
				
			
					  //ucwords makes the first letter in the names capital
			echo	'<h3>'. ucwords($results['first_name']) . ' ' . ucwords($results['last_name']) .'</h3>';
			//echo nl2br("\n");
			//echo nl2br("\n");
			echo'<table>';
			echo	 '<tr class="name"><td> Phone:</td><td>'. ($results['phone_num']) . '</td></tr>';
			echo	 '<tr class="name"><td> Mobile:</td><td>'. ($results['mobile_phone_num']) . '</td></tr>';
			echo	 '<tr class="name"><td> Email:</td><td>'. ($results['email']) . '</td></tr>';
			echo	 '<tr class="name"><td> Fax:</td><td>'. ($results['fax']) . '</td></tr>';
			$ad1 = ucwords($results['address_line1']);
			$ad2 = ucwords($results['address_line2']);
			$ad3 = ucwords($results['address_line3']);
			$ad4 = ucwords($results['address_line4']);
			$county = ucwords($results['county']);
			$country = ucwords($results['country']);
			echo	 '<tr class="name"><td> Address:</td><td>';
			if(!empty($ad1)){ 
				echo $ad1.',';
				echo nl2br("\n");
			}
			if(!empty($ad2)){ 
				echo $ad2.',';
				echo nl2br("\n");
			}
			if(!empty($ad3)){ 
				echo $ad3.',';
				echo nl2br("\n");
			}
			if(!empty($ad4)){ 
				echo $ad4.',';
				echo nl2br("\n");
			}
			if(!empty($county)){ 
				echo $county.',';
				echo nl2br("\n");
			}
			if(!empty($country)){ 
				echo $country;
			}
			echo '</td></tr>';
			$date = $results['last_contacted'];
			$properDate = date("d-m-Y", strtotime($date));
			echo	 '<tr class="name"><td> Last Contacted:</td><td>'. ($properDate) . '</td></tr>';
			echo	 '<tr class="name"><td> Sage ID:</td><td>'. ($results['sage_id']) . '</td></tr>';
			echo '</table>';

			echo	'</div>
				</li>';
		}
echo '</ul>';
*/

//testing


$sql2 = "SELECT * FROM `stock` WHERE stockid IN (SELECT jobid FROM uses WHERE jobid IN 
(SELECT jobid FROM jobs WHERE jobid IN (SELECT customerid FROM customer_requires WHERE customerid = '$customerid'))); ";
 
$res2 = mysqli_query($con,$sql2);
 
$result2 = array();
 
while($row = mysqli_fetch_array($res2)){
	array_push($result2,
		array('stockid'=>$row[0],
		'serialid'=>$row[1],
		'name'=>$row[2],
		'model'=>$row[3],
		'manufacturer'=>$row[4],
		'product_description'=>$row[5],
		'installation_date'=>$row[6],
		'inspection_date'=>$row[7],
		'service_date'=>$row[8],
		'location'=>$row[9],
		'contract_renewal_date'=>$row[10],
		'contract_with_us'=>$row[11],
		'funded_by_owner'=>$row[12],
		'last_results'=>$row[13]
	));
}
//print_r(array_values($result2));
foreach ($result as $results){
echo '<div class="main-section">
				
					<div class="container-fluid no-padding">
						<div class="col-md-7 no-padding">
							<div class="main-content panel panel-default no-margin">
								<header class="panel-heading clearfix">

									 <span class="avatar"></span>
									 <hgroup>
										 <a href="documentation/index.html" class="btn btn-default pull-right" rel="#overlay"><i class="fa fa-question-circle"></i></a>';
											 echo	'<h2>'. ucwords($results['first_name']) . ' ' . ucwords($results['last_name']) .'</h2>';
								echo	'</hgroup>
								</header>
								<section class="panel-body">
									<h3>Assets</h3>';
									/*<table style ="width:90%">
										<th><td>Name</td><td>Model</td></th>';
					foreach ($result2 as $results2){
						echo '<tr class="listing list-view">
							<td>'. ($results2['name']) . '</td>
							<td>'. ($results2['model']) . '</td>
							
							
							
						</tr>';
					}
					
					<td>Manufacturer</td><td>Install Date</td>
										<td>Service Date</td>
					<td>'. ($results2['contract_with_us']) . '</td>
					<td>'. ($results2['manufacturer']) . '</td>
							<td>'. ($results2['installation_date']) . '</td>
							<td>'. ($results2['service_date']) . '</td>
					<td>'. ($results2['location']) . '</td>
					<td>'. ($results2['serialid']) . '</td>
					<td>'. ($results2['contract_renewal_date']) . '</td>
					
					<td>'. ($results2['inspection_date']) . '</td>
					<td>'. ($results2['last_results']) . '</td>
					<td>'. ($results2['product_description']) . '</td>
					<td>'. ($results2['funded_by_owner']) . '</td>*/
							echo '</section>
							</div>
						</div>

						<div class="preview-pane col-md-5">
							<div class="content">
						  <h3>Details</h3>
								<ul class="fa-ul">';
									echo '<li><i class="fa-li fa fa-envelope"></i><small class="pull-right text-muted">Email</small>'. ($results['email']) .'<br></li>';
									echo '<li><i class="fa-li fa fa-phone"></i><small class="pull-right text-muted">Phone</small>'. ($results['phone_num']) .'<br></li>';
									echo '<li><i class="fa-li fa fa-mobile"></i><small class="pull-right text-muted">Mobile</small>'. ($results['mobile_phone_num']) .'<br></li>';
									echo '<li><i class="fa-li fa fa-fax"></i><small class="pull-right text-muted">Fax</small>'. ($results['fax']) .'<br></li>';
									echo '<li><i class="fa-li fa fa-home"></i><small class="pull-right text-muted">Address</small>';
									$ad1 = ucwords($results['address_line1']);
									$ad2 = ucwords($results['address_line2']);
									$ad3 = ucwords($results['address_line3']);
									$ad4 = ucwords($results['address_line4']);
									$county = ucwords($results['county']);
									$country = ucwords($results['country']);
									if(!empty($ad1)){ 
										echo $ad1.',';
										echo nl2br("\n");
									}
									if(!empty($ad2)){ 
										echo $ad2.',';
										echo nl2br("\n");
									}
									if(!empty($ad3)){ 
										echo $ad3.',';
										echo nl2br("\n");
									}
									if(!empty($ad4)){ 
										echo $ad4.',';
										echo nl2br("\n");
									}
									if(!empty($county)&& $county != $ad4 && $county != $ad3){ 
										echo $county.',';
										echo nl2br("\n");
									}
									if(!empty($country)){ 
										echo $country;
									}
									$date = $results['last_contacted'];
									$properDate = date("d-m-Y", strtotime($date));
									echo '</li>
								</ul>
								<div>';
								echo'<h4 style = "padding-top:8px">Additional info</h4>
								<ul class="fa-ul">
									<li><i class="fa-li fa fa-calendar"></i><small class="pull-right text-muted">Last Contacted</small>'. ($properDate) .'<br></li>
									<li><i class="fa-li fa fa-clipboard"></i><small class="pull-right text-muted">Sage ID</small>'. ($results['sage_id']) . '<br></li>
								</ul>
								</div>
							</div>
							<div class="preview">
							</div>
						</div>
					</div>
				</div>';
}
mysqli_close($con);
 
?>