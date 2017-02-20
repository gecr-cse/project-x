<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page defines the footer
 * Created on : <Date of creation>
 * NOTICE:  All information contained herein is, and remains
 * the property of GEC Raipur CS Department. The intellectual and technical concepts contained
 * herein are originated as part Industry Orientation program.
 * Dissemination of this information or reproduction of this material
 * is restricted unless prior written permission is obtained
 * from GEC Raipur CS Department.
 */
-->
<section class="sec-footer">
    <div class="container">
      <div class="row mbt0">
      <div class="col s3 l12 m3 ">
        <div class="col s6">
          <span class="left">Designed and Developed by Students of GEC(Government Engineering College)</span>
        </div>
        
        </div>
      </div>
    </div>
  </section>
  <script src="assets/scripts/jquery-1.9.1.min.js"></script>
<script src="assets/scripts/materialize.min.js"></script>
<script src="assets/scripts/jquery.colorbox-min.js"></script>
<script src="assets/scripts/jquery.validate.min.js"></script>

<script type="text/javascript">
  $('.slider').slider({full_width: true, indicators:true});
  	$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
</script>
