<?php
include_once(($_SERVER['DOCUMENT_ROOT'])."/functions/functions.php");
?>
         <div class="article-container">
            <article class="outcome group">
               <div class="inner group">
                  <div class="result-info"><input type="hidden" id="outcome" value="Family, not eligible">
                     <h2 class="result-title">Victoria Legal Aid doesn't cover all types of problems</h2>
                     
                     <p>You can also search for a legal center in your area - you may have to pay for advice.</p>
                     
                     <form method="get" class="find-location-for-service" action="#">
                        <fieldset>
                           <legend><strong>Find a legal center</strong><br></legend><label for="postcode">
                              Enter a VIC postcode
                              <input class="postcode" id="postcode" name="Location" type="text" placeholder="eg 3000"><input name="Pro" type="hidden" value="False"><select id="AREA" name="UmbrellaLegalIssue" class="dropmenu" style="display:none;">
                                 <option value="LIUFAM">Family</option></select></label><input type="submit" value="Find" class="button"><br></fieldset>
                     </form>
                  
                     <p>You may still get help and advice from the organisations listed below.</p>


                     
                    <p><h3>Other Organizations That Can Help</h3></p>
                     <ul>
                     <li><a href="#" onClick="trackOutboundLink(this, 'Outbound Links', '#');
                     return false;">Option 1</a>: [Description here]</li>
                     <li><a href="#" onClick="trackOutboundLink(this, 'Outbound Links', '#');
                     return false;">Option 2</a>: [Description here]</li>
                     <li><a href="#" onClick="trackOutboundLink(this, 'Outbound Links', '#');
                     return false;">Option 3</a>: [Description here]</li>
                        
                     <p>Still not sure what to do? You can call Victoria Legal Help for free information about the law on 1300 792 387, Monday to Friday from 8.45 am to 5.15 pm.</p> 
                     <p>If you need an interpreter let us know.</p>
                     <p>If we can't help you we can refer you to other organizations that can.</p>
                     
                  </div>
               </div>
            </article>
         </div>