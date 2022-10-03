<?php
	function generateRow(){
		$contents = '';
		include_once('dbconn.php');
		$sql = "SELECT * FROM `donor`";

		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			
			$datetime = $row['latest_donation_date'];
			if ($datetime == '0000-00-00 00:00:00'){
				$newdate = '-';
			}else{
				$date = explode(' ', $datetime);
				$orgdate = $date[0];
				$newdate = date("d-m-Y", strtotime($orgdate));
			}
			
			$contents .= "
			<tr>
				<td >".$row['prefix'].$row['donor_id']."</td>
				<td >".$row['donor_username']."</td>
				<td >".$row['donor_name']."</td>
				<td >".$row['donor_blood_type']."</td>
				<td >".$row['donor_age']."</td>
				<td >".$row['donor_gender']."</td>
				<td >".$row['donor_contact']."</td>
				<td >".$row['donor_address']."</td>
				<td >".$row['donor_email']."</td>
				<td >".$newdate."</td>	
			</tr>
			";
		}
		
		return $contents;
	}

	require_once('vendor/tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Donor Data Report");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$datetime = date("dmY h:i:sa");
    $pdf->AddPage('L','A4');  
    $content = '';  
    $content .= '
      	<h2 align="center">Donor Data Report</h2>
      	<table border="1" cellspacing="0" cellpadding="3" align="center">  
           <tr>  
                <th width="8%">Donor ID</th>
				<th width="10%">Username</th>
				<th width="15%">Name</th> 
				<th width="5%">Blood Type</th> 
				<th width="5%">Age</th> 
				<th width="6%">Gender</th> 
				<th width="10%">Contact</th> 
				<th width="15%">Address</th> 
				<th width="16%">Email</th> 
				<th width="10%">Latest Donation Date</th> 
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('donor_data_report"'.$datetime.'".pdf', 'I');
	

?>