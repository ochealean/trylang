<?php
// Array with animals names

// Database connection
$conn = new mysqli("localhost", "root", "", "opportunity");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

$u_s_e_r = [[], [], []];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $u_s_e_r[0][] = $row['user_fullname'];
        $u_s_e_r[1][] = $row['user_username'];
        $u_s_e_r[2][] = $row['user_password'];
    }
}

// Get the suggest parameter from URL
$request = $_GET["suggestt"];

$suggest = "";

// Lookup all suggestions from array if $request is different from ""
if ($request !== "") {
    $request = strtolower($request);
    $len = strlen($request);
    foreach ($u_s_e_r[0] as $name) {    
        //if substr dont possess the value $name's value has it will be false
        //example 'macmac' yung laman ng $name tas yung value ng substr is 'er' walang nagequal so magfafalse
        //pag nag false, yung $name don naman sya sa next value
        if (stristr($name, substr($request, 0, $len))) {
            if ($suggest === "") {
                $suggest = $name;
                //lagyan to ng conditional statement 
                //where kapag nagequal yung tinype sa textfield
                //sa html, mage-echo ng js na ie-enable yung pagsubmit ng form
            } else {
                $suggest .= ", $name";
            }
        }
    }
    
}

// Output "No suggestion" if no hint was found or output correct values
echo $suggest === "" ? "No suggestion" : $suggest;



$rqst = $_GET["ds"];

$sgts = "";

// Lookup all suggestions from array if $request is different from ""
if ($rqst !== "") {
    $rqst = strtolower($rqst);
    $len = strlen($rqst);
    foreach ($u_s_e_r[1] as $name) {    
        //if substr dont possess the value $name's value has it will be false
        //example 'macmac' yung laman ng $name tas yung value ng substr is 'er' walang nagequal so magfafalse
        //pag nag false, yung $name don naman sya sa next value
        if (stristr($name, substr($rqst, 0, $len))) {
            if ($sgts === "") {
                $sgts = $name;
                //lagyan to ng conditional statement 
                //where kapag nagequal yung tinype sa textfield
                //sa html, mage-echo ng js na ie-enable yung pagsubmit ng form
            } else {
                $sgts .= ", $name";
            }
        }
    }
    
}

// Output "No suggestion" if no hint was found or output correct values
echo $sgts === "" ? "No suggestion" : $sgts;

$conn->close();
?>
