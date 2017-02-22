<?php include_once(($_SERVER['DOCUMENT_ROOT'])."/template/header.php") ?>
<?php
/****** Choose topics that apply for this end point *******/
$not_eligible  = true;    // Choose true this if client is not eligible
$information   = false;     // Choose true if client is eligible to get information
$legal_help    = false;    // Choose true if client is eligigle to get legal help
?>
   <div id="wrapper" class="answer smart_answer">
      <div class="top-bar"></div>
      <section id="content" role="main" class="group">
         <header class="page-header group">
            <hgroup>
               <h1><span>Service</span> Your guige to find answers to your legal questions
               </h1>
            </hgroup>
            <nav class="skip-to-related"><a href="#related">Not what you're looking for? ?</a></nav>
         </header>
         <section class="intro">
            <div class="get-started-intro">
               <p>Find out what to do or where to go for legal help.</p>
            </div>
         </section>
         <div class="done-questions">
            <div class="start-again"><a href="/">Start again</a></div>
            <ol>
               <li class="done">
                  <h3 class="question"><span class="question-number">1</span>What kind of problem do you need help with?
                     
                  </h3>
                  <div class="answer">Wills & Estates</div>
                  <p class="undo"><a href="/">Change this answer</a></p>
               </li>
            </ol>
         </div><a name="c"></a>
         <?php
         
         if($information) {
            include_once(($_SERVER['DOCUMENT_ROOT'])."/template/end_points/information.php");
         }elseif($legal_help) {
            include_once(($_SERVER['DOCUMENT_ROOT'])."/template/end_points/legal_help.php");
         }elseif($not_eligible) {
            include_once(($_SERVER['DOCUMENT_ROOT'])."/template/end_points/not_eligible.php");
         }
         
         ?>
      </section>
   </div>
   
<?php include_once(($_SERVER['DOCUMENT_ROOT'])."/template/footer.php") ?>