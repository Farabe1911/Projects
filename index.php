<!DOCTYPE html>
<html lang="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasnimul Farabe</title>

<!-- Favicon -->
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Alternative formats -->


    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">


    <link rel='stylesheet' type='text/css' href='css/owl.carousel.css'>
    <link rel='stylesheet' type='text/css' href='css/owl.theme.css'>
    <link rel='stylesheet' type='text/css' href='css/owl.transitions.css'>
    <link rel='stylesheet' type='text/css' href='css/magnific-popup.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel='stylesheet' type='text/css' href='css/color-default.css'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>





    <!--=============================================================================
			Main Wrapper
		===============================================================================-->
    <!-- Main Content -->
    <div id="wrapper">
        <section class="front-section">
            <div class="container">




                <div class='transition-mask'></div>
                <div class="front-person-img" id="preview">
                    <img id="image_preview" src="" alt="" alt='Symp' /> <!-- Image Preview has been removed -->





                    <?php

                    // Include database connection
                    include 'db.php';
                    // Fetch the profile picture and position data from the database
                    $query = "SELECT profile_picture, x_pos, y_pos FROM users WHERE username = 'tasndzou'";
                    $stmt = $pdo->query($query);
                    $user = $stmt->fetch();

                    // Use default if no profile picture is set
                    $profile_picture = $user['profile_picture'] ?? 'img/default.png';
                    $angle = -45 * (M_PI / 180); // Convert degrees to radians
                    $x_pos = $user['x_pos'] ?? 0; // Default X position
                    $y_pos = $user['y_pos'] ?? 0; // Default Y position

                    // Calculate new positions
                    $rotated_x = ($x_pos * cos($angle)) - ($y_pos * sin($angle));
                    $rotated_y = ($x_pos * sin($angle)) + ($y_pos * cos($angle));

                    // Define the image width
                    $image_width = 1024; // Width of the image

                    // Scale the positions to fit within the image width
                    $scale_factor = $image_width / 1024; // Assuming the original positions are based on 1024px width
                    $adjusted_x = $rotated_x * $scale_factor;
                    $adjusted_y = $rotated_y * $scale_factor;
                    ?>
                    <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" style="transform: translate(<?php echo $adjusted_x; ?>px, <?php echo $adjusted_y; ?>px) rotate(-45deg); width: 1024px;">

                        </div>







                        <!--person's titles-->
                        <div class='front-person-titles'>

                            <!--title1-->
                            <span class='t1'>
                                Developer
                            </span>
                            <!--/title1-->

                            <!--title2-->
                            <span class='t2'>
                                Designer
                            </span>
                            <!--/title2-->

                            <!--title3-->
                            <span class='t3'>
                                Analyst
                            </span>
                            <!--/title3-->

                        </div>
                        <!--/person's titles-->

                        <nav class='front-person-links'>

                            <!--
							navigation links, data-section attribute points towards the section with id to be opened. 
						-->

                            <ul>

                                <li>
                                    <a href='#' data-section='about'>Resume</a>
                                </li>

                                <li>
                                    <a href='#' data-section='resume'>Timeline</a>
                                </li>

                                <!-- <li>
								<a href='#' data-section='services' >Services</a>
							</li>
							 -->
                                <li>
                                    <a href='#' data-section='portfolio'>Portfolio</a>
                                </li>

                                <!-- <li>
								<a href='#' data-section='blog' >My Blog</a>
							</li> -->

                                <li>
                                    <a href='#' data-section='contact'>Contact</a>
                                </li>

                                <li>
                                    <a href='#'>Hire Me!</a>
                                </li>

                            </ul>

                        </nav>

                        <div class=" front-heading text-center">
                            <h2>Tasnimul Farabe</h2>
                        </div>
                </div>

                <!--=============================================================================
			Preloader
		===============================================================================-->


                <div id="preloader">
                    <div class="loader">
                        <img src="img/load.gif" alt="Symp">
                    </div>
                </div>






        </section>
        <!--=============================================================================
				/Front Section
			===============================================================================-->

        <!--=============================================================================
				About Section
			===============================================================================-->
        <section id='about' class='about-section section'>

            <div class='basic-info section-block'>

                <div class='container'>

                    <div class='section-header text-center'>

                        <h2>Basic Info About Me</h2>

                        <!--divider-->
                        <div class='divider-draft center'></div>
                        <!--/divider-->


                    </div>

                    <div class='row'>

                        <!-- <div class='col-md-4' >
								 <div class='about-person-img' >
									
									<img src='img/man2.png' alt='symp'> 
								
								</div> 
							
							</div>  -->


                        <div class='col-md-8 about-info'>




                            <div class="container">
                                <h1>Hello! My name is Tasnimul Farabe (He/Him)</h1>
                                <p>
                                    I am a versatile professional with a strong background in
                                    computer science, web development, UI/UX design, technical
                                    advisory, and data science. I am currently working as a Data
                                    Science Researcher at TELUS International AI Data Solutions
                                    and a Technical Support Specialist at Concentrix. I have also
                                    gained extensive experience as a Laravel Developer, honing my
                                    skills in JavaScript, PHP, and various other technologies.
                                </p>

                                <h2 class="section-title">Professional Journey</h2>
                                <p>
                                    My journey in the tech world began with a deep-seated curiosity
                                    about how things work and a passion for solving complex problems.
                                    I pursued a Bachelor of Applied Science in Computer Science from
                                    The University of Winnipeg and a Bachelor of Science in Computer
                                    Science from the University of Manitoba, where I acquired a solid
                                    foundation in programming languages like Java and HTML.
                                </p>
                                <p>
                                    Over the years, I've had the opportunity to work in diverse roles
                                    that have allowed me to develop a broad skill set. At TELUS International,
                                    I focus on data research and SQL, contributing to AI data solutions. My
                                    role at Concentrix has strengthened my technical support skills, ensuring
                                    smooth operations and effective problem-solving for clients. Additionally,
                                    my part-time contract as a Laravel Developer has refined my abilities in
                                    web development, allowing me to create dynamic, responsive, and user-friendly
                                    web applications.
                                </p>

                                <h2 class="section-title">Skills and Expertise</h2>
                                <ul>
                                    <li><strong>Data Science:</strong> Proficient in data research and analysis, with hands-on experience in tools like Pandas.</li>
                                    <li><strong>Web Development:</strong> Skilled in JavaScript, PHP, and Laravel, with a knack for developing robust and scalable web applications.</li>
                                    <li><strong>Technical Support:</strong> Extensive experience in providing technical support, troubleshooting, and ensuring optimal performance of IT systems.</li>
                                    <li><strong>UI/UX Design:</strong> Passionate about creating intuitive and aesthetically pleasing user interfaces that enhance user experience.</li>
                                </ul>

                                <h2 class="section-title">Education</h2>
                                <ul>
                                    <li><strong>Bachelor of Applied Science in Computer Science</strong> - The University of Winnipeg (Sep 2021 - Dec 2023)</li>
                                    <li><strong>Bachelor of Science in Computer Science</strong> - University of Manitoba (2018 - 2021)</li>
                                </ul>
                            </div>

                            <div class='clearfix'></div>


                            <ul class='info-list'>

                                <li>
                                    <div class='inner'>
                                        <h4>Name</h4>
                                        <p>Tasnimul Farabe</p>
                                    </div>
                                </li>
                                <li>
                                    <div class='inner'>
                                        <h4>Experience</h4>
                                        <p id="experience">0 Years</p> <!-- Initial static value -->
                                    </div>
                                </li>
                                <li>
                                    <div class='inner'>
                                        <h4>Country</h4>
                                        <p>Canada</p>
                                    </div>
                                </li>
                                <li>
                                    <div class='inner'>
                                        <h4>Linkedin</h4>
                                        <a href="https://www.linkedin.com/in/tasnimul-farabe-7b8100226/" target="_blank"> Linkedin </a>
                                    </div>
                                </li>




                            </ul>

                            <a href="#" id="hire-me" class="symp-btn"><i class='ion-ios-chatboxes'></i>Hire Me For Work</a>


                            <!-- Navigation List -->

                            <a href="data/Resume.pdf" id="download-btn" class='symp-btn link-btn' download><i class='ion-ios-download'></i>Download Resume</a>

                        </div>



                    </div>




                </div>


            </div>

            <div class='skills-block section-block'>

                <div class='container'>

                    <div class='section-header text-center'>
                        <h2 class='animate text-over-block'>My Skills</h2>

                        <!--divider-->
                        <div class='divider-draft center'></div>
                        <!--/divider-->

                    </div>


                    <div class='row'>

                        <div class='col-md-6'>

                            <div class='skill'>

                                <h4>HTML/CSS</h4>

                                <div class='skill-bar' data-percent='90'>
                                    <div class='bar'>
                                        <div class='percent'>90%</div>
                                    </div>
                                </div>

                            </div>

                            <div class='skill'>

                                <h4>php</h4>

                                <div class='skill-bar' data-percent='70'>
                                    <div class='bar'>
                                        <div class='percent'>70%</div>
                                    </div>
                                </div>

                            </div>

                            <div class='skill'>

                                <h4>Java</h4>

                                <div class='skill-bar' data-percent='90'>
                                    <div class='bar'>
                                        <div class='percent'>90%</div>
                                    </div>
                                </div>

                            </div>



                        </div>

                        <div class='col-md-6'>

                            <div class='skill'>

                                <h4>Laravel</h4>

                                <div class='skill-bar' data-percent='90'>
                                    <div class='bar'>
                                        <div class='percent'>90%</div>
                                    </div>
                                </div>

                            </div>

                            <div class='skill'>

                                <h4>JavaScript</h4>

                                <div class='skill-bar' data-percent='85'>
                                    <div class='bar'>
                                        <div class='percent'>85%</div>
                                    </div>
                                </div>

                            </div>

                            <div class='skill'>

                                <h4>SEO</h4>

                                <div class='skill-bar' data-percent='95'>
                                    <div class='bar'>
                                        <div class='percent'>95%</div>
                                    </div>
                                </div>

                            </div>



                        </div>



                    </div>

                </div>

            </div>

            <div class='testimonials-block section-block'>
                <div class='container'>

                    <div class='section-header text-center'>

                        <h2 class='animate text-over-block'>Testimonials</h2>


                        <!--divider-->
                        <div class='divider-draft center'></div>
                        <!--/divider-->


                    </div>

                    <div class='row'>

                        <div class='col-md-8 col-md-offset-2'>

                            <div class='testimonials-slider'>

                                <div class='testimonial'>
                                    <p>

                                    I couldn’t be happier with the service! The team was responsive, knowledgeable, and went above and beyond to ensure I was satisfied. From start to finish, the experience was seamless, and the results exceeded my expectations. Highly recommended!
                                    </p>

                                    <div class='author'>
                                        <h4>Jack Smith</h4>
                                        <p>Project Manager at Onada</p>
                                    </div>
                                </div>

                                <div class='testimonial'>
                                    <p>
                                    Working with them was a game-changer for my business. They understood exactly what I needed and delivered on time with exceptional quality. Their attention to detail and commitment to my project made all the difference. I’m already seeing fantastic results!                                    </p>

                                    <div class='author'>
                                        <h4>Jessica Smith</h4>
                                        <p>Senior Developer </p>
                                    </div>
                                </div>

                                <div class='testimonial'>
                                    <p>
                                    Exceptional service and a fantastic experience! I was nervous about trying something new, but the team made it so easy and enjoyable. They listened to my needs, provided helpful guidance, and delivered results that truly impressed me. I’ll definitely be coming back!                                    </p>

                                    <div class='author'>
                                        <h4>Jim Smith</h4>
                                        <p>Freelance Developer</p>
                                    </div>
                                </div>




                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <div class='footer bg-lightgray section-block'>

                <div class='container'>

                    <div class='row'>

                        <div class='col-xs-6 text-left'>
                            <h4>Tasnimul Farabe</h4>
                        </div>

                        <div class='col-xs-6 text-right'>
                            <ul class='footer-social'>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-instagram'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-pinterest'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-linkedin'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>


        </section>
        <!--=============================================================================
				/About Section
			===============================================================================-->

        <!--=============================================================================
				Resume Section
			===============================================================================-->
        <section id='resume' class='resume-section section'>

            <div class='container'>
                <div class='row'>
                    <div class='col-md-6 col-md-offset-3'>
                        <div class='section-header text-center'>

                            <h2 class='animate text-over-block'>My Resume</h2>

                            <!--divider-->
                            <div class='divider-draft center'></div>
                            <!--/divider-->


                        </div>
                    </div>
                </div>
            </div>

            <div class='timeline-block section-block'>
                <div class='container'>
                    <ul class='timeline'>

                        <li class='timeline-header'>
                            <h4>Education</h4>
                        </li>

                        <li>

                            <div class='timeline-desc'>

                                <h4>2021-2023</h4>

                            </div>

                            <div class='timeline-content'>

                                <h4>BSc in Computer Science</h4>
                                <span>The Univeristy Of Winnipeg</span>

                                <p>
                                    Applied computer science
                                </p>

                            </div>

                        </li>

                        <li class='inverse'>

                            <div class='timeline-desc'>

                                <h4>2015-2017</h4>

                            </div>

                            <div class='timeline-content'>

                                <h4>CIE A'Levels</h4>
                                <span>University Of Cambridge</span>

                                <p>
                                    Science

                                </p>

                            </div>

                        </li>

                        <li>

                            <div class='timeline-desc'>

                                <h4>2014</h4>

                            </div>

                            <div class='timeline-content'>

                                <h4>CIE O' Levels</h4>
                                <span>Univeristy Of Cambridge</span>

                                <p>
                                    Science
                                </p>

                            </div>

                        </li>


                        <li class='timeline-header'>
                            <h4>Experience</h4>
                        </li>


                        <li>

                            <div class='timeline-desc'>

                                <h4>2024-Present</h4>

                            </div>

                            <div class='timeline-content'>

                                <h4>Data analyst</h4>
                                <span>TELUS International</span>

                                <p>
                                    <!-- work experiences -->
                                </p>

                            </div>

                        </li>

                        <li class='inverse'>

                            <div class='timeline-desc'>

                                <h4>2022-Present</h4>

                            </div>

                            <div class='timeline-content'>

                                <h4>Technical Support Advisor</h4>
                                <span>Concentrix</span>

                                <p>
                                    <!-- work experience -->
                                </p>

                            </div>

                        </li>

                        <li>

                            <div class='timeline-desc'>

                                <h4>2021-Present</h4>

                            </div>

                            <div class='timeline-content'>

                                <h4>Larave Developer</h4>
                                <span>TDP</span>

                                <p>
                                    <!-- work experiences -->
                                </p>

                            </div>

                        </li>


                    </ul>
                </div>
            </div>

            <div class='hobbies-block bg-lightgray section-block'>
                <div class='container'>

                    <div class='section-header text-center'>
                        <h2 class='animate text-over-block'>My Hobbies</h2>
                        <!--divider-->
                        <div class='divider-draft center'></div>
                        <!--/divider-->
                    </div>

                    <div class='row'>

                        <div class='col-md-2 col-sm-4 col-xs-6'>

                            <div class='hobby'>

                                <div class='icon'>
                                    <i class='ion-ios-game-controller-b'></i>
                                </div>

                                <h4>Driving</h4>

                            </div>

                        </div>

                        <div class='col-md-2 col-sm-4 col-xs-6'>

                            <div class='hobby'>

                                <div class='icon'>
                                    <i class='ion-ios-book'></i>
                                </div>

                                <h4>Traiding</h4>

                            </div>

                        </div>

                        <div class='col-md-2 col-sm-4 col-xs-6'>

                            <div class='hobby'>

                                <div class='icon'>
                                    <i class='ion-ios-chatboxes'></i>
                                </div>

                                <h4>Networking</h4>

                            </div>

                        </div>

                        <div class='col-md-2 col-sm-4 col-xs-6'>

                            <div class='hobby'>

                                <div class='icon'>
                                    <i class='ion-ios-musical-notes'></i>
                                </div>

                                <h4>Golf</h4>

                            </div>

                        </div>

                        <div class='col-md-2 col-sm-4 col-xs-6'>

                            <div class='hobby'>

                                <div class='icon'>
                                    <i class='ion-beer'></i>
                                </div>

                                <h4>Swimming</h4>

                            </div>

                        </div>

                        <div class='col-md-2 col-sm-4 col-xs-6'>

                            <div class='hobby'>

                                <div class='icon'>
                                    <i class='ion-ios-football'></i>
                                </div>

                                <h4>Football</h4>

                            </div>

                        </div>



                    </div>



                </div>
            </div>



            <div class='footer bg-lightgray section-block'>

                <div class='container'>

                    <div class='row'>

                        <div class='col-xs-6 text-left'>
                            <h4>Tasnimul Farabe</h4>
                        </div>

                        <div class='col-xs-6 text-right'>
                            <ul class='footer-social'>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-instagram'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-pinterest'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-linkedin'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>


        </section>
        <!--=============================================================================
				/Timeline Section
			===============================================================================-->


        <!--=============================================================================
				Portfolio Section
			===============================================================================-->
        <section id='portfolio' class='portfolio-section section'>

            <div class='portfolio-block section-block'>

                <div class='container'>

                    <div class='row'>
                        <div class='col-md-6 col-md-offset-3'>

                            <div class='section-header text-center'>

                                <h2 class='animate text-over-block'>Portfolio</h2>

                                <!--divider-->
                                <div class='divider-draft center'></div>
                                <!--/divider-->

                                <p>
                                    Check out my works. Software Requirements Analysis & Design. Java based Software Architecture and Deisgn Patter. Java based Data Structure and Algorithmn.
                                </p>

                            </div>

                        </div>
                    </div>

                    <div id='portfolio-filters'>
                        <ul>
                            <li>
                                <a href='#' data-group='all' class='active'>All</a>
                            </li>
                            <li>
                                <a href='#' data-group='web'>Software Requirements Analysis & Design</a>
                            </li>
                            <li>
                                <a href='#' data-group='tech'>Software Design & Architecture</a>
                            </li>
                            <li>
                                <a href='#' data-group='photography'>Data Structure & Algorithmn</a>
                            </li>
                        </ul>
                    </div>

                    <div id='portfolio-grid' class='portfolio-items'>

                        <div class='item' data-groups='["all","web"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/1.jpeg'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>
                                            Software Requirements Analysis & Design: Project 1</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='projects/project1.html' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/1.jpeg' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class='item' data-groups='["all","web"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/2.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Software Requirements Analysis & Design: Project 2</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='projects/project2.html' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/2.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class='item' data-groups='["all","web"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/3.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Project Title</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href="projects/project3.html" target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/3.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class='item' data-groups='["all","web"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/4.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Project Title</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href="work.html#project4" target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/4.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class='item' data-groups='["all","tech"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/5.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Software Requirements Analysis & Design: Project 2</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='work.html#project5' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/5.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class='item' data-groups='["all","tech"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/6.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Project Title</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='work.html#project6' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/6.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class='item' data-groups='["all","tech"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/7.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Project Title</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='work.html#project7' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/6.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class='item' data-groups='["all","tech"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/8.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Project Title</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='work.html#project8' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/8.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>


                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class='item' data-groups='["all","photography"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/9.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Project Title</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='work.html#project9' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/9.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class='item' data-groups='["all","photography"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/10.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Project Title</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='work.html#project10' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/10.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class='item' data-groups='["all","photography"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/11.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Project Title</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='work.html#project11' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/11.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class='item' data-groups='["all","photography"]'>
                            <div class='inner'>

                                <img alt='symp' src='img/12.png'>

                                <div class='caption'>

                                    <div class='caption-inner'>

                                        <h4>Project Title</h4>

                                        <ul class='links'>

                                            <li>
                                                <a href='work.html#project12' target="_blank">
                                                    <i class='ion-ios-plus-empty'></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href='img/12.png' class='image-link'>
                                                    <i class='ion-ios-search'></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>



                    </div>

                </div>

            </div>

            <div class='footer bg-lightgray section-block'>

                <div class='container'>

                    <div class='row'>

                        <div class='col-xs-6 text-left'>
                            <h4>Tasnimul Farabe</h4>
                        </div>

                        <div class='col-xs-6 text-right'>
                            <ul class='footer-social'>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-instagram'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-pinterest'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        <i class='ion-social-linkedin'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>

        </section>
        <!--=============================================================================
				/Portfolio Section
			===============================================================================-->


        <!--=============================================================================
    Contact Section
===============================================================================-->
<section id='contact' class='contact-section section'>
    <div class='contact-block section-block'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-6 col-md-offset-3'>
                    <div class='section-header text-center'>
                        <h2 class='animate text-over-block'>Contact Me</h2>
                        <div class='divider-draft center'></div>
                        <p>
                            I'm available for freelancing. If you want something to be built or just to say hi, feel free to shoot me a message.
                        </p>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class='col-md-8 col-md-offset-2'>
                    <div class="contact-form">
                        <form id="contact-form" action="index.php" method="post" data-toggle="validator">
                            <div id="contact-form-result"></div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone (optional)">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea name="message" rows="5" class="form-control" placeholder="Message" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>

<!-- reCAPTCHA Widget -->
<div class="g-recaptcha" data-sitekey="6LeBnNYqAAAAABPj_Ww62oBgcYouXnQRe0SUVDsz"></div>

                            <div class="form-group text-center">
                                <button type="submit" class="symp-btn btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class='footer bg-lightgray section-block'>
            <div class='container'>
                <div class='row'>
                    <div class='col-xs-6 text-left'>
                        <h4>Tasnimul Farabe</h4>
                    </div>
                    <div class='col-xs-6 text-right'>
                        <ul class='footer-social'>
                            <li><a href='#'><i class='ion-social-facebook'></i></a></li>
                            <li><a href='#'><i class='ion-social-instagram'></i></a></li>
                            <li><a href='#'><i class='ion-social-pinterest'></i></a></li>
                            <li><a href='#'><i class='ion-social-linkedin'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================================================================
    /Contact Section
===============================================================================-->


        <!--close button-->
        <div class='close-btn'>
            <span></span>
            <span></span>
        </div>
        <!--/close button-->


    </div>
    <!--=============================================================================
			/Main Wrapper
		===============================================================================-->


    <!--=============================================================================
			JavaScript Files
		===============================================================================-->
    <script src='js/jquery.min.js'></script>
    <script src='js/jquery.stellar.min.js'></script>
    <script src='js/modernizr.js'></script>
    <script src='js/owl.carousel.min.js'></script>
    <script src='js/jquery.shuffle.min.js'></script>
    <script src='js/jquery.magnific-popup.min.js'></script>
    <script src='js/validator.min.js'></script>
    <script src='js/smoothscroll.js'></script>
    <script src='js/script.js'></script>

</body>

</html>