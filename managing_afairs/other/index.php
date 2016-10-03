<?php include_once(($_SERVER['DOCUMENT_ROOT'])."/template/header.php") ?>
<?php
/****** Choose topics that apply for this end point *******/
$not_eligible  = false;    // Choose true this if client is not eligible
$information   = true;     // Choose true if client is eligible to get information
$legal_help    = false;    // Choose true if client is eligigle to get legal help
?>
   <div id="wrapper" class="answer smart_answer">
      <div class="top-bar"></div>
      <section id="content" role="main" class="group">
         <header class="page-header group">
            <hgroup>
               <h1><span>Service</span> Check if you can get legal aid
               </h1>
            </hgroup>
            <nav class="skip-to-related"><a href="#related">Not what you're looking for? ?</a></nav>
         </header>
         <section class="intro">
            <div class="get-started-intro">
               <p>Find out how Legal Help can help you with your legal matter.</p>
            </div>
         </section>
         <div class="done-questions">
            <div class="start-again"><a href="/">Start again</a></div>
            <ol>
               <li class="done">
                  <h3 class="question"><span class="question-number">1</span>What kind of problem do you need help with?
                     
                  </h3>
                  <div class="answer">Your safety</div>
                  <p class="undo"><a href="/">Change this answer</a></p>
               </li>
               <li class="done">
                  <h3 class="question"><span class="question-number">2</span>     Tell us a little bit more about your problem.  
                  </h3>
                  <div class="answer"> All other personal affairs matters</div>
                  <p class="undo"><a href="/family/">Change this answer</a></p>
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