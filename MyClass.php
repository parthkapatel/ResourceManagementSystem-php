<?php
 
class MyClass{
    private $con;
    function __construct() {
        $this->con= new PDO('mysql:host=localhost;dbname=res_man_sys','root','');
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    function insertData($nm,$unm,$pw)
    {
        $q='INSERT INTO `dept_details`( `dname`, `duname`, `dpwd`) values(:nm,:unm,:pw)';
        try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':nm', $nm);
        $stmt->bindParam(':unm', $unm);
        $stmt->bindParam(':pw', $pw);
        try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
    }
    function ValidateUser($un,$pw)
    {
        $q="select * from `dept_details` where duname=:un and dpwd=:pw";
         try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':un', $un);
        $stmt->bindParam(':pw', $pw);
         try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $f = $stmt->rowCount();
        return $f;
   
    }
    function displayUserData($un)
    {
        if($un == "")
        {
            $q="select * from profile";
        }
        else
        {
            $q="select * from profile where uname=:un";
        }
         try {
                $stmt = $this->con->prepare($q);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            $stmt->bindParam(':un', $un);
             try {
                $stmt->setFetchMode(PDO::FETCH_NUM);
                $r = $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            $r = $stmt->fetchall();

            return $r;
        

    }
   function updateData($un,$pw,$cont,$ev)
    {
        $q='update profile set uname=:un,pass=:pw,contact=:cont,event=:ev where uname=:un;';
        try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':un', $un);
        $stmt->bindParam(':pw', $pw);
        $stmt->bindParam(':cont', $cont);
        $stmt->bindParam(':ev', $ev);
        try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
    }
    function deleteData($un)
    {
        $q='delete from profile where uname=:un ';
        try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':un', $un);
        try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
    }

    function changePwd($un,$old,$new)
    {
        $q='update dept_details set dpwd=:new where duname=:un and dpwd=:old;';
        try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':un', $un);
        $stmt->bindParam(':old', $old);
        $stmt->bindParam(':new', $new);
        try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
    }

    function insertResData($rname,$rqty,$rprice,$rdate)
    {
        $q='INSERT INTO `res_details`( `rname`, `rqty`, `rprice`, `rbuydate`) VALUES (:nm,:qty,:pr,:dt)';
        try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':nm', $rname);
        $stmt->bindParam(':qty', $rqty);
        $stmt->bindParam(':pr', $rprice);
        $stmt->bindParam(':dt', $rdate);
        try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
    }

    function insertRoomData($roname,$rodes)
    {
        $q='INSERT INTO `room_details`( `roname`, `rodesc`) VALUES (:nm,:de)';
        try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':nm', $roname);
        $stmt->bindParam(':de', $rodes);
        try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
    }
    function fetchRoomData()
    {
        $q="select * from `room_details`";
         try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
         try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $f = $stmt->fetchAll();
        return $f;
   
    }
    function fetchResData()
    {
        $q = "select * from allocate_res ar inner join res_details rd where ar.rid=rd.rid";
       // $q="select * from `res_details`";
         try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
         try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $f = $stmt->fetchAll();
        return $f;
   
    }

    function insertallData($roid,$rid,$aqty)
    {
        $q='INSERT INTO `allocate_res`(`roid`, `rid`, `qty`) VALUES (:roid,:rid,:qty)';
        try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':roid', $roid);
        $stmt->bindParam(':rid', $rid);
        $stmt->bindParam(':qty', $aqty);
        try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
    }

    function fetchRoomTableData()
    {
        $q="select * from `room_details`";
         try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
         try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $f = $stmt->fetchAll();
        return $f;
   
    }

    function fetchResTableData()
    {
        $q="select * from `res_details`";
         try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
         try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $f = $stmt->fetchAll();
        return $f;
   
    }

    function fetchAllTableData()
    {
        $q="select * from `allocate_res`";
         try {
            $stmt = $this->con->prepare($q);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
         try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $f = $stmt->fetchAll();
        return $f;
   
    }
}
?>
