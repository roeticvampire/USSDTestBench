
<?php
        #We obtain the data which is contained in the post url on our server.

        $text=$_GET['USSD_STRING'];
        $phonenumber=$_GET['MSISDN'];
        $serviceCode=$_GET['serviceCode'];


        $level = explode("*", $text);
        if (isset($text)) {
   
                //How do we add comments to this shit hue hue hue
        if ( $text == "" ) {
            $response="CON Welcome to the Mobile UPI Payments\nPlease enter your PIN";
        }

        if(isset($level[0]) && $level[0]!="" && !isset($level[1])){
            if($level[0]=="680123" && $phonenumber=="7004359495")
          $response="CON Hi ".$level[0].", Let's proceed!";
          else
             
          $response="END Nope ".$level[0].", You can't do this!";
        }
        else if(isset($level[1]) && $level[1]!="" && !isset($level[2])){
                $response="CON Please enter you national ID number\n"; 

        }
        else if(isset($level[2]) && $level[2]!="" && !isset($level[3])){
            //Save data to database
            $data=array(
                'phonenumber'=>$phonenumber,
                'fullname' =>$level[0],
                'electoral_ward' => $level[1],
                'national_id'=>$level[2]
                );

            

            $response="END Thank you ".$level[0]." for registering.\nWe will keep you updated"; 
    }

        header('Content-type: text/plain');
        echo $response;

    }

?>
