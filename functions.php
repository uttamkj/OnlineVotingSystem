<?php
require_once "dbconnect.php";

function logIn($email, $password){
    global $conn;
    try {
        $qry = "SELECT * FROM voter WHERE email=? AND password=?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return false;
        }
    } catch (Exception $e) {
        $e->getMessage();
    } finally {
        $conn->close();
    }
}
function logIn_admin($email, $password){
    global $conn;
    echo "$email $password";
    try {
        $qry = "SELECT * FROM admins WHERE email=? AND password=?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return false;
        }
    } catch (Exception $e) {
        $e->getMessage();
    } finally {
        $conn->close();
    }
}

function getUser($email){
    global $conn;
    try {
        $qry = "SELECT * FROM voter where email=?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $res = $stmt->get_result();
        if($res->num_rows>0){
            return $res;
        }else{
            return $conn->error;
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function updatePassword($email,$newPass){
    global $conn;
    try {
        $qry = "UPDATE voter SET password=? WHERE email=?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("ss",$newPass,$email);
        $stmt->execute();
        if($conn->affected_rows>0){
            return true;
        }else{
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getParties(){
    global $conn;
    try {
        $qry = "SELECT * FROM parties";
        $stmt = $conn->prepare($qry);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0){
            return $result;
        } else {
            return false;
        }
    } catch (Exception $e) {
        die($e->getMessage());
    } finally{
        $conn->close();
    }
}
function deletePartyById($id){
    global $conn;
    try{
        $qry = "DELETE FROM parties WHERE id=?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if($conn->affected_rows > 0){
            return true;
        } else {
            return false;
        }

    } catch (Exception $e){
        die($e->getMessage());
    } finally{
        $conn->close();
    }
}

function updateUserProfile($email, $name, $mobile, $dob, $voterid) {
    global $conn;
    try {
        $qry = "UPDATE voter SET name=?, mobile=?, date=?, voterID=? WHERE email=?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("sssss", $name, $mobile, $dob, $voterid, $email);
        $stmt->execute();
        if($conn->affected_rows>0){
            return true;
        }else{
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>