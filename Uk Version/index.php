<?php include_once(($_SERVER['DOCUMENT_ROOT'])."/template/header.php") ?>

   <div id="wrapper" class="answer smart_answer">
      <div class="top-bar"></div>
      <section id="content" role="main" class="group">
         <header class="page-header group">
            <hgroup>
               <h1><span>Service</span> Your guide to find answers to your legal questions           
               </h1>
            </hgroup>
            <!-- <nav class="skip-to-related"><a href="#related">Not what you're looking for? ?</a></nav> -->
         </header>
        <section class="intro">
            <div class="get-started-intro">
                <p>To give you the right information we need to ask some general questions about your legal problem. Click on the topic below that best matches your legal question.</p>
            </div>
        </section>
         <div class="step current homepage-only">
            <form accept-charset="UTF-8" action="#" method="post" id="navigator"><input type="hidden" name="path" id="path" value=""><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"></div>
               <div class="current-question" id="current-question">
                  <h2><span class="question-number"> </span>Choose the area you most need help with
                     
                  </h2>
                  <div class="question-body">
                     <div class="">
                        <ul id="start" class="options">
 
                        <li><label for="response_1"><input id="response_1" name="response" type="radio" value="wills"> Wills & Estates</label> Someone close to me has passed away and I have questions about their money, property or what to do next.</li>
                        <li><label for="response_2"><input id="response_2" name="response" type="radio" value="migration"> Migration</label> I have questions about my visa and living, working or studying in Australia.</li>
                        <li><label for="response_3"><input id="response_3" name="response" type="radio" value="housing"> Housing & Tenancy </label> I have questions about my rights as a Tenant or Landlord, renting, disputes with neighbors, or going to court for a tenancy issue.</li>
                        <li><label for="response_4"><input id="response_4" name="response" type="radio" value="personal_injury"> Personal Injury</label> I've been in an accident or want to make a claim, injured at work, experienced medical negligence, and I want to talk to a lawyer.</li>
                        <li><label for="response_10"><input id="response_10" name="response" type="radio" value="other"> Any other problem </label></li>

                        </ul>
                     </div>
                  </div>
                  <div class="next-question"><button name="next" type="submit" class="medium button">Next</button></div>
               </div>
            </form>
         </div>
      </section>
   </div>
   
<?php include_once(($_SERVER['DOCUMENT_ROOT'])."/template/footer.php") ?>