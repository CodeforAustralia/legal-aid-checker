<?php
$module_path = drupal_get_path('module', 'matter');
include_once $module_path . "/template/header.php";
$main_matters = $vars['main_matters'];
?>
		<div class="row banner-section">
			<div class="banner row">
				<img src="/sites/all/modules/matter/images/background-04.png" alt="Find answers to your legal questions" title="Find answers to your legal questions">
				<div class="info-box col-md-6 col-sm-8 col-xs-8">
					<h2>Find answers to your legal questions</h2>
					<span>A tool to help you understand your options and decide what to do next.</span>
				</div>
			</div>
		</div>
		
	    <div class="breadcrumbs">
	    	<span class="home-icon" tabindex="0"><i class="fa fa-home" aria-hidden="true"></i></span>
	    	<span class="print-icon pull-right" tabindex="0" id="print-page"><i class="fa fa-print" aria-hidden="true"></i></span>
	    </div>
	    
		<div class="row content main">
			
			<div class="main-content">				
				<h3>Find out what to do or where to go for legal help</h3>
				<span>To give you the right information we need to ask some general questions about your legal problem. Click on the topic below that best matches your legal question.</span>
				<div class="container">
					<div class="matters-container">
					    <?php
					    foreach($main_matters as $matter) {
					        ?>
				        <div class="matter-box col-xs-12 col-sm-6 col-md-4 col-lg-3">
	    					<div class="row">
	    						<div class="matter-item col-xs-12" id="<?= $matter['nid']; ?>" tabindex="0">
	    							<div class="row">
	    								<div class="matter-content col-xs-10">
	    									<h4><?= $matter['title']; ?></h4>
				    						<p class="description"><?= $matter['description']['und'][0]['value']; ?></p>
				    					</div>	
	    								<div class="col-xs-2 arrows">
	    									<i class="pull-right fa fa-chevron-right" aria-hidden="true"></i>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
					        <?php
					    }
					    ?>
					</div>	
				</div>
			</div>
			
			<div class="inner-sections">
			    <div class="container">
			    	<div class="question">
			    		<h3></h3>
			    		<span></span>
			    	</div>
			    	<div class="answers">
			    		<div class="radio">
						  <label><input type="radio" name="optradio">Option 1</label>
						</div>
			    	</div>
			    	<div class="buttons">
			    		<button id="next" class="btn btn-default col-xs-4 col-md-2">Next</button>
			    	</div>
			    </div>
			</div>
			
			<div class="outcome-page">
			</div>
			
			<div class="col-xs-12 bottom">
				<hr class="col-xs-12 split-line" >
				<span class="wrong-link feedback-open" tabindex="0">Is there anything wrong with this page?</span>
				<div class="col-xs-12 feedback-box">
					<form>
						<div class="col-xs-12 col-md-6">
							<p class="feedback-title">Help us improve the Legal Aid Checker</p>
							<p class="feedback-description">Your feedback is important in helping us improve the website. Please, do not include your personal or financial information.</p>
							<textarea class="col-xs-6" name="suggestion" maxlength="512" id="suggestion"></textarea>
							
						</div>
						<div class="col-xs-12 col-md-6">
							<span class="pull-right feedback-close" tabindex="0"><i class="fa fa-times" aria-hidden="true"></i></span>
							<button class="btn btn-default col-xs-5 col-md-3 feedback-btn">Send Feedback</button>
						</div>
					</form>
				</div>
			</div>
			
		</div>

<?php
include_once $module_path . "/template/footer.php";
?>