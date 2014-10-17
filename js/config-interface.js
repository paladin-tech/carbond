// JavaScript Document

jQuery(function(){
			//fieldset collapsible

			$('.collapsible fieldset legend').click(function(){
				$(this).parent().find('.group_info').slideToggle("slow");
			});
			$('.accordion .control-group label.control-label').click(function(){
				$(this).parent().find('.controls').slideToggle("slow");
			});
			// accordion

			$(document).click(function() {

				$(".conteudo").slideUp();

			});

			

			$(".niceform").click(function(event) {

				event.stopPropagation();

			});

						

			$(".titulo").click(function(){

				$(".conteudo").slideUp();

				var cont = $(this).next();

				$(cont).slideDown("fast");  

				   

			});

			

			//scroll

			function cleanScrollGarbage(){

				$('.wrap').unwrap();

				$('.slimScrollBar').remove();

				$('.slimScrollRail').remove();

				$('.wrap').removeAttr('style');

			}

			function initScroll() {

				var larguraTela = $(window).width();

				var alturaTela = $(window).height();

				var alturaHeader = $('header').height();

				var alturaFooter = $('footer').height();

				var alturaWrap = (alturaTela-alturaHeader-alturaFooter);

				//alert($(document).height());

				if(alturaWrap > 100 && larguraTela >=1200){					

					cleanScrollGarbage();	

					$('.wrap').slimScroll({

						height: alturaWrap+'px',

						distance: '20px'

					});					

				}else{			

					cleanScrollGarbage();					

				}

			}

				

			//call function

			initScroll();

			//call function when resize screen

			$(window).resize(function() {

				initScroll(); 				

			});

			

			

			

			

		});