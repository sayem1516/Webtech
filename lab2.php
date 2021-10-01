<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }

    </style>
</head>

<body>
    <?php
    
    $name_error = $email_error = $dob_error = $gender_error = $degree_error =$blood_error = "";
    
    $name = $email = $dob = $gender = $degree = $blood ="";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {


        #Name

        if(empty($_POST["name"])) {
            $name_error = "Name must be fulfilled";
        } else {
            $name = check_input($_POST["name"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $name_error = "Only letters and white space allowed";
            }
        }



       #Email

       if (empty($_POST["email"])) {
           $email_error = "Email Required";
       } else {
           $email = check_input($_POST["email"]);
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
       }
        
       
  #Date of Birth

    if (empty($_POST["dob"])) {
    $dob_error = "Date of Birth Required";
  } else {
    $dob = check_input($_POST["dob"]);
  }
       
       
    
# gender
    if (empty($_POST["gender"])) {
    $gender_error = "Gender Required";
  } else {
    $gender = check_input($_POST["gender"]);
  }

  # Degree

    if (empty($_POST["degree"])) {
    $degree_error = "Degree Required";
  } else {
    $degree = check_input($_POST["degree"]);
  }

    # Blood Group

    if (empty($_POST["blood"])) {
    $blood_error = "Blood Group Required";
  } else {
    $blood = check_input($_POST["blood"]);
  }
  
  
      
} #main
    
    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}
 ?>
    
    <h2>PHP Form With Validation</h2>
    <p><span class="error">* Required Field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <lable>Name : </lable>
        <input type="text" name="name">
        <span class= "error">* <?php echo $name_error;?> </span>
        <br><br>
        
        <lable>E-mail : </lable>
        <input type="text" name="email">
        <span class="error">* <?php echo $email_error;?></span>
        <br><br>
        
        <lable>Date of Birth : </lable>
        <input type="Date" name="dob">
        <span class="error">* <?php echo $dob_error;?></span>
        <br><br>
        
         <label>Gender : </label>
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <span class="error">* <?php echo $gender_error;?></span>
        <br><br>
        

        
         <label>Degree : </label>
        <input type="radio" name="degree" value="SSC">SSC
        <input type="radio" name="degree" value="HSC">HSC
        <input type="radio" name="degree" value="BSc">BSc
        <input type="radio" name="degree" value="MSc">MSc
        <span class="error">* <?php echo $gender_error;?></span>
        <br><br>
        
      <label for="blood">Choose your Blood group:</label>

<select name="blood" id="blood">
  <option value="AB+">AB+</option>
  <option value="AB-">AB-</option>
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="B+">B+</option>
  <option value="B-">B-</option>
  <option value="O+">O+</option>
  <option value="O-">O-</option>

  
</select>
  <br><br>    
        
        <input type="submit" name="submit" value="Submit">
    
    </form>
    
    <?php
    if (isset($_POST["submit"])) {
        echo "<h1>Your Input : </h2>";
        echo "Name : ". $name . "<br>";
        echo "E-mail : ". $email . "<br>";
        echo "Date of Birth  : ". $dob . "<br>";
        echo "Gender : ". $gender . "<br>";
        echo "Degree  : ". $degree  . "<br>";
        echo "Blood group  : ". $blood  . "<br>";
        
    }
    
    
    ?>
    

</body>

</html>