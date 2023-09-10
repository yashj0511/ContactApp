<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles.css">

  <title>Cosmo Junkie</title>
  <style>
    .error{
      color: red;
    }
    #successMessage
    {
           
            text-align: center;
            height: 5vh;
            width: 100%;
            background-color: green; 
            margin-top: 20px;
    }
   
  </style>
</head>
<body>
<!--   navbar start-->
  <nav class="site-nav grid">
    <h1>Cosmo Junkie</h1>
    <ul>
      <li><a href="#portfolio">Portfolio</a></li>
      <li><a href="#skills">Skills</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>
<!--   navbar end -->
<!--   sucessmessege display for few sec after form submission -->
  <div id="successMessage" style="display:none;">
    <span>Message sent successfully!</span>
</div>
<!--   welcom section start -->
<section id="welcome" class="grid">
    <div class="welcome-text">
      <h2>Space Enthusiast<br />& JavaScript Developer</h2>
      <p class="leading">Ex NeilsenIQ software Engineer Inter Ex Carer.ai Full stack development Intern</p>
      <a href="#portfolio" class="button">View my work</a>
    </div>
    <!-- toggle class on submit data -->

    <div class="welcome-img">
      <img src="assets/banner_image.png" alt="pic of planet">
    </div>
  </section>
  <section id="portfolio">
    <h3>Some of my Projects</h3>
    <div class="projects grid">
      <a href="#">
        <img src="assets/project_1.png" alt="space race image">
        <h4>Space Race Game</h4>
      </a>
      <a href="#">
        <img src="assets/project_2.png" alt="planet boy image">
        <h4>Planet Boy API</h4>
      </a>
      <a href="#">
        <img src="assets/project_3.png" alt="captain cosmo image">
        <h4>Captain Cosmo Blog</h4>
      </a>
      
    </div>
  </section>
<!--   welcome section end -->

<!--   skills section start -->
  <section id="skills">
    <h3>Things I Can Do</h3>
    <ul class="grid">
      <li>
        <img src="assets/comet_1.svg" alt="comet">
        <h4>JavaScript</h4>
      </li>
      <li>
        <img src="assets/comet_2.svg" alt="comet">
        <h4>React</h4>
      </li>
      <li>
        <img src="assets/comet_3.svg" alt="comet">
        <h4>Node</h4>
      </li>
      <li>
        <img src="assets/comet_4.svg" alt="comet">
        <h4>Express</h4>
      </li>
    </ul>
    <p class="leading">I have done development in Django,Flask,React,Node,Express MongoDB so I have good understanding of Full stack development.</p>
  </section>
<!-- skill section end -->

<!--   contact section start -->
  <section id="contact">
    <h3>Get In Touch</h3>
    <p class="leading"> If there is any query free to ask me </p>

<!--   contact form -->
    <form id="form" action="" method="post" onsubmit="return validateForm();">
      <span id="nameError" class="error"></span>
      <input type="text" placeholder='NAME' name="name" id="name">
      <span id="emailError" class="error"></span>
      <input type="email" placeholder='EMAIL' name="email" id="email">
      <span id="subjectError" class="error"></span>
      <input type="text" placeholder='SUBJECT' name="subject" id="subject">
      <span id="messageError" class="error"></span>
      <textarea placeholder='YOUR MESSAGE' name="messege" id="messege"></textarea>
    
      <button class="button" id="btn" type="submit" value="Submit">Send</button>
    </form>
  </section>
<!--  contatct section end -->

<!--   footer start -->
  <footer>
    <div class="grid">
      <p class="copyright">Copyright 2023 Cosmo Junkie</p>
      <ul class="social">
        <li><a href="#"><img src="assets/icon_fb.svg" alt="facebook"></a></li>
        <li><a href="#"><img src="assets/icon_tw.svg" alt="twitter"></a></li>
      </ul>
    </div>
  </footer>
<!-- footer end -->
  <script src="./script.js"></script>
  <?php
//to avoid warning to display on same page
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['messege']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$messege=$_POST['messege'];
 

// Database connection 
$conn=new mysqli('localhost','root','','contacts');
if($conn->connect_error){
    die('Connecttion failed : '.$conn->connect_error);
}
else
{
    // Validate name
    if (empty($name)) 
    {
        $nameErr = "Name is required";
    } 

    // Validate email
    if (empty($email)) 
    {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $emailErr = "Invalid email format";
    }
    if (empty($subject)) 
    {
        $subjectErr = "Subject is required";
    }

    // Validate message
    if (empty($messege)) 
    {
        $messageErr = "Message is required";
    }
   
    //check if all are valid the only insert data to database thet is server side validation
    if (empty($nameErr) && empty($emailErr) && empty($messageErr) && empty($subjectErr)) 
    {
       
    $stmt=$conn->prepare("insert into messeges(name,email,subject,messege)values(?,?,?,?)");
    $stmt->bind_param("ssss",$name,$email,$subject,$messege);//binding parameters to variables
    $stmt->execute();
    $stmt->close();
    $conn->close();
   
    }
   

}
}
?>

  
</body>
</html>

