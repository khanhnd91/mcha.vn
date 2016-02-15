/**
 * jquery.clever-infinite-scroll.js
 * Working with jQuery 2.1.4
*/
/* global define, require, history, window, document, location  */
(function(root, factory){
	"use strict";
	if (typeof define === "function" && define.amd) {
		define(["jquery"], factory);
	} else if (typeof exports === "object") {
		factory(require("jquery"));
	} else {
		factory(root.jQuery);
	}
})(this, function($) {
	"use strict";
	/**
	 * Elements it reffers. Each page must has those selectors.
	 * The structure must be same as article1.html
	 * #post-area, .post, .next-post a
	*/
	$.fn.cleverInfiniteScroll = function(options) {
		/**
		 * Settings
		*/
		var defaults = {
			contentsWrapperSelector: "#post-area",
			contentSelector: ".post",
			nextSelector: ".prev-post a",
			loadImage: ""
		}, settings = $.extend(defaults, options);

		/**
		 * Private methods
		*/
		var generateHiddenSpans = function(_title, _path) {
			return "<span class='hidden-title' style='display:none'>" + _title + "</span><span class='hidden-url' style='display:none'>" + _path + "</span>";
		},
		setTitleAndHistory = function(_title, _path) {
			// Set history
			history.pushState(null, _title, _path);
			// Set title
			$("title").html(_title);
		},
		changeTitleAndURL = function(_value) {
			// value is an element of a content user is seeing
			// Get title and path of the article page from hidden span elements
			var title = $(_value).children(".hidden-title:first").text(),
				path = $(_value).children(".hidden-url:first").text();
			if($("title").text() !== title) {
				// If it has changed
				setTitleAndHistory(title, path);
			}
		};

		/**
		 * Initialize
		*/
		// Get current page's title and URL.
		var title = $("title").text(),
			path = $(location).attr("href"),
			documentHeight = $(document).height(),
			windowHeight = (typeof window.outerHeight !== "undefined") ? Math.max(window.outerHeight, $(window).height()) : $(window).height(),
			threshold = windowHeight,
			$contents = $(settings.contentSelector);
		// Set hidden span elements and history
		$(settings.contentSelector + ":last").append(generateHiddenSpans(title, path));
		setTitleAndHistory(title, path);
		/**
		 * scroll
		*/
		var lastScroll = 0, currentScroll;
		$(window).scroll(function() {
                    documentHeight = $(document).height();

			// Detect where you are
			window.clearTimeout($.data("this", "scrollTimer"));
			$.data(this, "scrollTimer", window.setTimeout(function() {
				// Get current scroll position
				currentScroll = $(window).scrollTop();
                                
				// Detect whether it's scrolling up or down by comparing current scroll location and last scroll location
				if(currentScroll > lastScroll) {
					// If it's scrolling down
					$contents.each(function(key, value) {
						if($(value).offset().top + $(value).height() > currentScroll) {
							// Change title and URL
							changeTitleAndURL(value);
							// Quit each loop
							return false;
						}
					});
				} else if(currentScroll < lastScroll) {
					// If it's scrolling up
					$contents.each(function(key, value) {
						if($(value).offset().top + $(value).height() - windowHeight / 2 > currentScroll) {
							// Change title and URL
							changeTitleAndURL(value);
							// Quit each loop
							return false;
						}
					});
				} else {
					// When currentScroll == lastScroll, it does not do anything because it has not been scrolled.
				}
				// Renew last scroll position
				lastScroll = currentScroll;
			}, 200));

			if($(window).scrollTop() + windowHeight + threshold >= documentHeight ) {
				// If scrolling close to the bottom

				// Getting URL from settings.nextSelector
				var $url = [$(settings.nextSelector).attr("href")];
				
				$(settings.nextSelector).remove();
				if($url[0] !== undefined) {
					// If the page has link, call ajax
					if(settings.loadImage !== "") {
						$(settings.contentsWrapperSelector).append("<img src='" + settings.loadImage + "' id='cis-load-img'>");
					}
					$.ajax({
						url: $url[0]+"?autoload=1",
						dataType: "html",
						success: function(res) {
							// Get title and URL
							title = $(res).filter("title").text();
							path = $url[0];
							// Set hidden span elements and history
							$(settings.contentsWrapperSelector).append($(res).find(settings.contentSelector).append(generateHiddenSpans(title, path)));
							if($(res).find(settings.contentSelector).find(settings.nextSelector).length === 0){
								//If there is no nextSelector in the contentSelector, get next Slecter from response and append it.
								$(settings.contentsWrapperSelector).append($(res).find(settings.nextSelector));
							}
							documentHeight = $(document).height();
							$contents = $(settings.contentSelector);
							$("#cis-load-img").remove();
							//twitter��Facebook�̃X�N���v�g���ēǂݍ���
							FB.XFBML.parse(document.getElementById('fb-like'));
							twttr.widgets.load(document.getElementById('p-entry__tw-follow__cont'));
							
							//�A�i���e�B�N�X�ɔ��f������
							var nextGuid  = path.match(/\/[0-9]+$/);
                                                        if(settings.callback){
                                                            settings.callback.call(this);
                                                        }
							ga('send',  'pageview', {
						                'page' : nextGuid,
						                'title': title});
							ga('send', 'event','matcha','autoload',nextGuid);

						}
					});
				}
			}
		}); //scroll

		return (this);
	}; //$.fn.cleverInfiniteScroll
});
