<?php include_once(($_SERVER['DOCUMENT_ROOT'])."/template/header.php") ?>

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
                  <div class="answer">Managing your affairs</div>
                  <p class="undo"><a href="/">Change this answer</a></p>
               </li>
            </ol>
         </div><a name="c"></a><div class="step current">
            <form accept-charset="UTF-8" action="#" method="post" id="navigator"><input type="hidden" name="path" id="path" value="/managing_afairs"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"></div>
               <div class="current-question" id="current-question">
                  <h2><span class="question-number">2</span>     What is your managing your affairs problem about?  
                  </h2>
                     <div class="">
                        <ul class="options">
                           <li><label for="response_1"><input id="response_1" name="response" type="radio" value="powers_attorney"> Powers of attorney</label></li>
                           <li><label for="response_2"><input id="response_2" name="response" type="radio" value="wills_estates"> Wills and estates</label></li>
                           <li><label for="response_3"><input id="response_3" name="response" type="radio" value="other"> Other</label></li>
                        </ul>
                     </div>
                  </div>
                  <div class="next-question"><button name="next" type="submit" class="medium button" id="next">Next</button></div>
               </div>
            </form>
         </div>
      </section>
   </div>
   
<?php include_once(($_SERVER['DOCUMENT_ROOT'])."/template/footer.php") ?>