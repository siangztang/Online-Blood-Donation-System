<?php
	function generateRow(){
		$contents = '';
		include_once('dbconn.php');
		$sql = "SELECT * FROM `seeker`";

		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			$datetime = $row['latest_request_date'];
			if ($datetime == '0000-00-00 00:00:00'){
				$newdate = '-';
			}else{
				$date = explode(' ', $datetime);
				$orgdate = $date[0];
				$newdate = date("d-m-Y", strtotime($orgdate));
			}
			$contents .= "
			<tr>
				<td >".$row['prefix'].$row['seeker_id']."</td>
				<td >".$row['seeker_username']."</td>
				<td >".$row['seeker_name']."</td>
				<td >".$row['seeker_blood_type']."</td>
				<td >".$row['seeker_age']."</td>
				<td >".$row['seeker_gender']."</td>
				<td >".$row['seeker_contact']."</td>
				<td >".$row['seeker_address']."</td>
				<td >".$row['seeker_email']."</td>
				<td >".$newdate."</td>
			</tr>
			";
		}
		
		return $contents;
	}

	require_once('vendor/tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("seeker Data Report");  
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
    $pdf->AddPage('L', 'A4');
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$datetime = date("dmY h:i:sa");  
    $content = '';  
    $content .= '
      	<h2 align="center">Seeker Data Report</h2>
      	<h4>Seeker Table</h4>
      	<table border="1" cellspacing="0" cellpadding="3" align="center">  
           <tr>  
                <th width="8%">Seeker ID</th>
				<th width="10%">Username</th>
				<th width="15%">Name</th> 
				<th width="5%">Blood Type</th> 
				<th width="5%">Age</th> 
				<th width="6%">Gender</th> 
				<th width="10%">Contact</th> 
				<th width="15%">Address</th> 
				<th width="16%">Email</th> 
				<th width="10%">Latest Request Date</th> 
           </tr>
      ';  
    $content .= generateRow();  
    $content .= '</table>';
	
	
    $pdf->writeHTML($content);  
    $pdf->Output('seeker_data_report"'.$datetime.'".pdf', 'I');
	

?>