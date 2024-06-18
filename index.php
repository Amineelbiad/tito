<?php

$conn = mysqli_connect('localhost','root','','contact') or die('connection failed');

if (isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $number = mysqli_real_escape_string($conn,$_POST['number']);
    $msg = mysqli_real_escape_string($conn,$_POST['message']);
    $to = "elbiad.amio@gmail.com"; // this is my Email address
    $from = $_POST['email']; // this is the sender's Email address
	$subject = "Vielen Dank für Ihre Kontaktaufnahme";
	$nm = $_POST['name'];
	$em = $_POST['email'];
	$nb = $_POST['number'];
	$mg = $_POST['message'];
	$msg1 = $nm . " wrote the following:" . "\n\n" . $_POST['message'];
    $msg2 = "Here is a copy of your message " . $nm . "\n\n" . $_POST['message'];
	$headers = "From:" . $from;
    $headers2 = "From:" . $to;

    $select_message = mysqli_query($conn,"SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die ('query failed');

    if( mysqli_num_rows($select_message) > 0){
        $message[]= 'message send already!';

    }else {
        mysqli_query($conn,"INSERT INTO `contact_form`(name , email , number , message) VALUES ('$name','$email', '$number', '$msg')") or die ('query failed');
        mail($to,$nm,$mg,$headers);
		mail($from,$subject,$msg2,$headers2);
        $message[]= 'Vielen Dank für Ihre Nachricht! Wir werden uns umgehend bei Ihnen melden!';
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortFolio AMINE</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

   <!-- aos css link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>

<?php
if (isset($message)){
    foreach($message as $message){
        echo '
            <div class="message" data-aos="zoom-out">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>  
        ';
    }
}
?>

    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#home" class="logo"><img src="./images/logoo.png" alt=""></a>
        <nav class="navbar">
            <a href="#home" class="active">home</a>
            <a href="#about">about</a>
            <a href="#services">services</a>
            <a href="#certificat">Certificates</a>
            <a href="#contact">contact</a>
        </nav>
        <div class="follow">
            <a href="https://x.com/AMINEElbiad" class="fab fa-twitter"></a>
            <a href="https://www.linkedin.com/in/amine-elbiad-4b87aa313/" class="fab fa-linkedin"></a>
            <a href="https://github.com/Amineelbiad" class="fab fa-github"></a>
        </div>
    </header>

    <section class="home" id="home">
        <div class="image" data-aos="fade-right">
            <img src="images/homeimage.mp4" alt="">
        </div>
        <div class="content">
            <h3 data-aos="fade-up">Hallo, ich bin Amine Elbiad</h3>
            <span data-aos="fade-up">Webdesigner & Entwickler</span>
            <p data-aos="fade-up">“„Ich mache dein digitales Leben mehr einfacher.”</p>
            <a href="#about" class="btn" data-aos="fade-up">über mich</a>
        </div>
    </section>


    <section class="about" id="about">
        <h1 class="heading" data-aos="fade-up"> <span>Biografie</span></h1>
        <div class="biography">
            <p data-aos="fade-up">Ich bin Full-Stack-Entwickler und arbeite mit HTML-, CSS-,  und PHP. Als leidenschaftlicher Lerner erkunde ich ständig verschiedene Bereiche, um meine IT-Kenntnisse zu verbessern. Meine größte Stärke ist mein Selbstvertrauen, den Status quo in Frage zu stellen.</p>
            <div class="bio">
                <h3 data-aos="zoom-in"><span>Name : </span>Amine Elbiad</h3>
                <h3 data-aos="zoom-in"><span>Email : </span>elbiad.ami@gmail.com</h3>
                <h3 data-aos="zoom-in"><span>Address : </span>Freiburg, Deutschland</h3>
                <h3 data-aos="zoom-in"><span>Phone : </span>+49176 77405581</h3>
                <h3 data-aos="zoom-in"><span>Alter : </span>23</h3>
                <h3 data-aos="zoom-in"><span>Erfahrung  :  </span>Ich habe im 2021 mit dem Programmieren begonnen und kann sagen,dass ich über mehr als die nötigen Grundlagen verfüge, um mein Interesse auszudrücken.</h3>
            </div>
            <a href="/files/offenbach.pdf" class="btn" data-aos="flip-down">Lebenslauf herunterladen</a>
        </div>

        <div class="skills" data-aos="fade-up">

            <h1 class="heading"> <span>Skills</span></h1>

            <div class="progress">
                <div class="bar" data-aos="fade-left">
                    <h3><span>HTML</span><span>90%</span></h3>
                </div>
                <div class="bar" data-aos="fade-left">
                    <h3><span>Canva</span><span>80%</span></h3>
                </div>
                <div class="bar" data-aos="fade-right">
                    <h3><span>CSS</span><span>60%</span></h3>
                </div>
                <div class="bar" data-aos="fade-left">
                    <h3><span>JavaScript</span><span>40%</span></h3>
                </div>
                <div class="bar" data-aos="fade-right">
                    <h3><span>PHP</span><span>40%</span></h3>
                </div>
            </div>
        </div>

        <div class="edu-exp">

            <h1 class="heading" data-aos="fade-up"><span>Studium und Erfahrung</span></h1>
            <div class="row">

                <div class="box-container">
                    <h3 class="title" data-aos="fade-right">Studium</h3>

                    <div class="box" data-aos="fade-right">
                        <span>( 2020 - 2023 )</span>
                        <h3>Marketing digital und betriebsmanagement</h3>
                        <p>Universität Mohammed V, Rabat-Marokko</p>
                    </div>

                    <div class="box" data-aos="fade-right">
                        <span>( 2016 - 2019 )</span>
                        <h3>Abitur</h3>
                        <p>Wirtschaftswissenschaften und Management Eljadida, Marocco</p>
                    </div>

                </div>

                <div class="box-container">
                    <h3 class="title" data-aos="fade-left">Erfahrung</h3>

                    <div class="box" data-aos="fade-left">
                        <span>( 07 - 09.2022 )</span>
                        <h3>Full-Stack-Entwickler</h3>
                        <p>Call center (Audio a vis), Rabat/Marokko</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="services" id="services">

        <h1 class="heading" data-aos="fade-up"><span>Services</span></h1>

        <div class="box-container">
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-code"></i>
                <h3>Web-Entwickler</h3>
                <p>Webentwickler Front-End & Back-End</p>
            </div>


            <div class="box" data-aos="zoom-in">
                <i class="fab fa-bootstrap"></i>
                <h3>Bootstrap</h3>
                <p>Responsive und mobile Websites</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fab fa-wordpress"></i>
                <h3>Wordpress</h3>
                <p>Blog-Tool, Veröffentlichungsplattform und CMS</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fa-solid fa-laptop-code"></i>
                <h3>Softwareentwickler</h3>
                <p>Erstellen, Entwerfen, Bauen, Bereitstellen und Warten</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-bullhorn"></i>
                <h3>Digitales Marketing</h3>
                <p>Online-Marketing, soziale Medien und webbasierte Werbung</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-paint-brush"></i>
                <h3>Graphique Designer</h3>
                <p>Gestaltung von Flyern, Bannern, Logos, Grafiken, Artwork</p>
            </div>

        </div>

    </section>

    <section class="certificat" id="certificat">
        <h1 class="heading" data-aos="fade-up"><span>Zertifikate</span></h1>
        <div class="box-container">

            <div class="box" data-aos="zoom-in">
                <img src="./images/B2.jpg" alt="">
                <h3>b2 Zertifikate</h3>
                <a href="./files/b2.pdf" class="btn">Herunterladen</a>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="./images/abitur.jpg" alt="">
                <h3>Abitur</h3>
                <a href="./files/abitur.pdf" class="btn">Herunterladen</a>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="./images/Deug.jpg" alt="">
                <h3>Bachlor 2 jahre</h3>
                <a href="./files/deug.php.pdf" class="btn">Herunterladen</a>
            </div>

        </div>
    </section>

    <section class="contact" id="contact">

        <h1 class="heading" data-aos="fade-up"><span>Schreibe mir ;)</span></h1>

        <form action="" method="post">
            <div class="flex">
                <input data-aos="fade-right" type="text" name="name" placeholder="Your Name" class="box" required>
                <input data-aos="fade-left" type="email" name="email" placeholder="Your Email" class="box" required>
            </div>
            <input data-aos="fade-up" type="number" min ="0" name="number" placeholder="Phone Number" class="box" required>
            <textarea data-aos="fade-up" class="box" name="message" id="" placeholder="Your Message" cols="30" rows="10" required></textarea>

            <input type="submit" data-aos="zoom-in" value="Nachricht senden" name="send" class="btn">
        </form>

        <div class="box-container">
        
            <div class="box" data-aos="zoom-in-up">
                <i class="fas fa-phone"></i>
                <h3>Telefon</h3>
                <p>+49176 77405581</p>
            </div>

            <div class="box" data-aos="zoom-in-up">
                <i class="fas fa-envelope"></i>
                <h3>Email</h3>
                <p>elbiad.ami@gmail.com</p>
            </div>

            <div class="box" data-aos="zoom-in-up">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Address</h3>
                <p>Freiburg, Deutschland</p>
            </div>

        </div>
    </section>

    <div class="credit"> &copy; Copyright @ <?php echo date('Y'); ?> By <span>Amine Elbiad</span> </div>


</body>
<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- aos js link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

   AOS.init({
      duration:800,
      delay:300
   });

</script>

</html>