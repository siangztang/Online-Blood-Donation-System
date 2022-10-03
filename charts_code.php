<?php
    $current_date = date("Y-m-d");
    $current_volumn_query = "SELECT date(donate_date_time) as date, sum(blood_volume) as total_volume from blood WHERE `blood_status` = 'Good' GROUP by date HAVING date = '$current_date';";
    $current_volumn_query_result = mysqli_query($conn, $current_volumn_query);

    $data = mysqli_fetch_all($current_volumn_query_result, MYSQLI_ASSOC);

    $total_volume = array_map(function ($item) {
        return $item['total_volume'];
    }, $data);

    if (empty($total_volume)){
        $total_volume = ["0"];
    }

    $previous_date = date('Y-m-d', strtotime( $current_date . " -1 days"));
    $previous_volumn_query = "SELECT date(donate_date_time) as date, sum(blood_volume) as total_volume from blood WHERE `blood_status` = 'Good' GROUP by date HAVING date = '$previous_date';";
    $previous_volumn_query_result = mysqli_query($conn, $previous_volumn_query);

    $data = mysqli_fetch_all($previous_volumn_query_result, MYSQLI_ASSOC);

    $total_volume2 = array_map(function ($item) {
        return $item['total_volume'];
    }, $data);

    if (empty($total_volume2)){
        $total_volume2 = ["0"];
    }


    $admin_query = "SELECT * FROM `admin`";
    $admin_result = mysqli_query($conn, $admin_query);
    $total_row_admin = mysqli_num_rows($admin_result);

    $donor_query = "SELECT * FROM `donor`";
    $donor_result = mysqli_query($conn, $donor_query);
    $total_row_donor = mysqli_num_rows($donor_result);

    $healthcare_professional_query = "SELECT * FROM `healthcare_professional`";
    $healthcare_professional_result = mysqli_query($conn, $healthcare_professional_query);
    $total_row_healthcare_professional = mysqli_num_rows($healthcare_professional_result);

    $seeker_query = "SELECT * FROM `seeker`";
    $seeker_result = mysqli_query($conn, $seeker_query);
    $total_row_seeker = mysqli_num_rows($seeker_result);

    $blood_donation_center_query = "SELECT * FROM `blood_donation_center`";
    $blood_donation_center_result = mysqli_query($conn, $blood_donation_center_query);
    $total_row_blood_donation_center = mysqli_num_rows($blood_donation_center_result);

    $blood_aplus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'A+';";
    $blood_aplus_result = mysqli_query($conn, $blood_aplus);

    $data = mysqli_fetch_all($blood_aplus_result, MYSQLI_ASSOC);

    $blood_aplus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_aplus_volumn)){
        $blood_aplus_volumn = ["0"];
    }

    $blood_bplus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'B+';";
    $blood_bplus_result = mysqli_query($conn, $blood_bplus);

    $data = mysqli_fetch_all($blood_bplus_result, MYSQLI_ASSOC);

    $blood_bplus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_bplus_volumn)){
        $blood_bplus_volumn = ["0"];
    }

    $blood_oplus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'O+';";
    $blood_oplus_result = mysqli_query($conn, $blood_oplus);

    $data = mysqli_fetch_all($blood_oplus_result, MYSQLI_ASSOC);

    $blood_oplus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_oplus_volumn)){
        $blood_oplus_volumn = ["0"];
    }

    $blood_abplus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'AB+';";
    $blood_abplus_result = mysqli_query($conn, $blood_abplus);

    $data = mysqli_fetch_all($blood_abplus_result, MYSQLI_ASSOC);

    $blood_abplus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_abplus_volumn)){
        $blood_abplus_volumn = ["0"];
    }

    $blood_aminus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'A-';";
    $blood_aminus_result = mysqli_query($conn, $blood_aminus);

    $data = mysqli_fetch_all($blood_aminus_result, MYSQLI_ASSOC);

    $blood_aminus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_aminus_volumn)){
        $blood_aminus_volumn = ["0"];
    }

    $blood_bminus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'B-';";
    $blood_bminus_result = mysqli_query($conn, $blood_bminus);

    $data = mysqli_fetch_all($blood_bminus_result, MYSQLI_ASSOC);
    
    $blood_bminus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_bminus_volumn)){
        $blood_bminus_volumn = ["0"];
    }

    $blood_ominus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'O-';";
    $blood_ominus_result = mysqli_query($conn, $blood_ominus);

    $data = mysqli_fetch_all($blood_ominus_result, MYSQLI_ASSOC);

    $blood_ominus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_ominus_volumn)){
        $blood_ominus_volumn = ["0"];
    }

    $blood_abminus = "SELECT sum(blood_volume) as blood_volume from blood WHERE `blood_status` = 'Good' group by blood_group HAVING blood_group = 'AB-';";
    $blood_abminus_result = mysqli_query($conn, $blood_abminus);

    $data = mysqli_fetch_all($blood_abminus_result, MYSQLI_ASSOC);

    $blood_abminus_volumn = array_map(function ($item) {
        return $item['blood_volume'];
    }, $data);

    if (empty($blood_abminus_volumn)){
        $blood_abminus_volumn = ["0"];
    }


    $donation_query = "SELECT monthname(donate_date_time) as month, count(*) as total_donate_per_month from blood group by month order by month;";

    $donation_result = mysqli_query($conn, $donation_query);

    $data = mysqli_fetch_all($donation_result, MYSQLI_ASSOC);

    $donation_xValues = array_map(function ($item) {
        return $item['month'];
    }, $data);

    $donation_yValues = array_map(function ($item) {
        return $item['total_donate_per_month'];
    }, $data);

    $request_query = "SELECT monthname(request_date_time) as month, count(*) as total_request_blood from blood_request WHERE `request_status` = 'success' group by month;";

    $request_result = mysqli_query($conn, $request_query);

    $data = mysqli_fetch_all($request_result, MYSQLI_ASSOC);

    $request_xValues = array_map(function ($item) {
        return $item['month'];
    }, $data);

    $request_yValues = array_map(function ($item) {
        return $item['total_request_blood'];
    }, $data);
?>