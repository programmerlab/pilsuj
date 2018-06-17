jQuery(function(t){function e(){return{language:{errorLoading:function(){return wc_country_select_params.i18n_searching},inputTooLong:function(t){var e=t.input.length-t.maximum;return 1===e?wc_country_select_params.i18n_input_too_long_1:wc_country_select_params.i18n_input_too_long_n.replace("%qty%",e)},inputTooShort:function(t){var e=t.minimum-t.input.length;return 1===e?wc_country_select_params.i18n_input_too_short_1:wc_country_select_params.i18n_input_too_short_n.replace("%qty%",e)},loadingMore:function(){return wc_country_select_params.i18n_load_more},maximumSelected:function(t){return 1===t.maximum?wc_country_select_params.i18n_selection_too_long_1:wc_country_select_params.i18n_selection_too_long_n.replace("%qty%",t.maximum)},noResults:function(){return wc_country_select_params.i18n_no_matches},searching:function(){return wc_country_select_params.i18n_searching}}}}if("undefined"==typeof wc_country_select_params)return!1;if(t().selectWoo){var n=function(){t("select.country_select:visible, select.state_select:visible").each(function(){var n=t.extend({placeholderOption:"first",width:"100%"},e());t(this).selectWoo(n),t(this).on("select2:select",function(){t(this).focus()})})};n(),t(document.body).bind("country_to_state_changed",function(){n()})}var o=wc_country_select_params.countries.replace(/&quot;/g,'"'),c=t.parseJSON(o);t(document.body).on("change","select.country_to_state, input.country_to_state",function(){var e=t(this).closest(".woocommerce-billing-fields, .woocommerce-shipping-fields, .woocommerce-shipping-calculator");e.length||(e=t(this).closest(".form-row").parent());var n=t(this).val(),o=e.find("#billing_state, #shipping_state, #calc_shipping_state"),i=o.parent(),a=o.attr("name"),r=o.attr("id"),s=o.val(),_=o.attr("placeholder")||o.attr("data-placeholder")||"";if(c[n])if(t.isEmptyObject(c[n]))o.parent().hide().find(".select2-container").remove(),o.replaceWith('<input type="hidden" class="hidden" name="'+a+'" id="'+r+'" value="" placeholder="'+_+'" />'),t(document.body).trigger("country_to_state_changed",[n,e]);else{var l="",u=c[n];for(var p in u)u.hasOwnProperty(p)&&(l=l+'<option value="'+p+'">'+u[p]+"</option>");o.parent().show(),o.is("input")&&(o.replaceWith('<select name="'+a+'" id="'+r+'" class="state_select" data-placeholder="'+_+'"></select>'),o=e.find("#billing_state, #shipping_state, #calc_shipping_state")),o.html('<option value="">'+wc_country_select_params.i18n_select_state_text+"</option>"+l),o.val(s).change(),t(document.body).trigger("country_to_state_changed",[n,e])}else o.is("select")?(i.show().find(".select2-container").remove(),o.replaceWith('<input type="text" class="input-text" name="'+a+'" id="'+r+'" placeholder="'+_+'" />'),t(document.body).trigger("country_to_state_changed",[n,e])):o.is('input[type="hidden"]')&&(i.show().find(".select2-container").remove(),o.replaceWith('<input type="text" class="input-text" name="'+a+'" id="'+r+'" placeholder="'+_+'" />'),t(document.body).trigger("country_to_state_changed",[n,e]));t(document.body).trigger("country_to_state_changing",[n,e])}),t(function(){t(":input.country_to_state").change()})});
;(function ($) {
	$(document).ready(function(){
		var $fade =  $('.fade-slide').data('fade');
		var $dots =  $('.fade-slide').data('dots');
		var $autoplay =  $('.fade-slide').data('autoplay');
		var $rtl 		= $('.fade-slide').data('rtl');
		var $autoplaySpeed =  $('.fade-slide').data('autoplaySpeed');
		$('.fade-slide').slick({
		  dots: $dots,
		   autoplay: $autoplay,
           autoplaySpeed: $autoplaySpeed,
		  infinite: true,
		   rtl: $rtl,		
		  fade: $fade,
		  cssEase: 'linear'
		});
		$(".fade-slide").fadeIn(300, function() {
			$(this).removeClass("loading");
		});
	});
})(jQuery);
;/*! fancyBox v2.1.5 fancyapps.com | fancyapps.com/fancybox/#license */
(function(r,G,f,v){var J=f("html"),n=f(r),p=f(G),b=f.fancybox=function(){b.open.apply(this,arguments)},I=navigator.userAgent.match(/msie/i),B=null,s=G.createTouch!==v,t=function(a){return a&&a.hasOwnProperty&&a instanceof f},q=function(a){return a&&"string"===f.type(a)},E=function(a){return q(a)&&0<a.indexOf("%")},l=function(a,d){var e=parseInt(a,10)||0;d&&E(a)&&(e*=b.getViewport()[d]/100);return Math.ceil(e)},w=function(a,b){return l(a,b)+"px"};f.extend(b,{version:"2.1.5",defaults:{padding:15,margin:20,width:900,height:600,minWidth:100,minHeight:100,maxWidth:9999,maxHeight:9999,pixelRatio:1,autoSize:!0,autoHeight:!1,autoWidth:!1,autoResize:!0,autoCenter:!s,fitToView:!0,aspectRatio:!1,topRatio:0.5,leftRatio:0.5,scrolling:"auto",wrapCSS:"",arrows:!0,closeBtn:!0,closeClick:!1,nextClick:!1,mouseWheel:!0,autoPlay:!1,playSpeed:3E3,preload:3,modal:!1,loop:!0,ajax:{dataType:"html",headers:{"X-fancyBox":!0}},iframe:{scrolling:"auto",preload:!0},swf:{wmode:"transparent",allowfullscreen:"true",allowscriptaccess:"always"},keys:{next:{13:"left",34:"up",39:"left",40:"up"},prev:{8:"right",33:"down",37:"right",38:"down"},close:[27],play:[32],toggle:[70]},direction:{next:"left",prev:"right"},scrollOutside:!0,index:0,type:null,href:null,content:null,title:null,tpl:{wrap:'<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',image:'<img class="fancybox-image" src="{href}" alt="" />',iframe:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen'+
(I?' allowtransparency="true"':"")+"></iframe>",error:'<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',closeBtn:'<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',next:'<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',prev:'<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'},openEffect:"fade",openSpeed:250,openEasing:"swing",openOpacity:!0,openMethod:"zoomIn",closeEffect:"fade",closeSpeed:250,closeEasing:"swing",closeOpacity:!0,closeMethod:"zoomOut",nextEffect:"elastic",nextSpeed:250,nextEasing:"swing",nextMethod:"changeIn",prevEffect:"elastic",prevSpeed:250,prevEasing:"swing",prevMethod:"changeOut",helpers:{overlay:!0,title:!0},onCancel:f.noop,beforeLoad:f.noop,afterLoad:f.noop,beforeShow:f.noop,afterShow:f.noop,beforeChange:f.noop,beforeClose:f.noop,afterClose:f.noop},group:{},opts:{},previous:null,coming:null,current:null,isActive:!1,isOpen:!1,isOpened:!1,wrap:null,skin:null,outer:null,inner:null,player:{timer:null,isActive:!1},ajaxLoad:null,imgPreload:null,transitions:{},helpers:{},open:function(a,d){if(a&&(f.isPlainObject(d)||(d={}),!1!==b.close(!0)))return f.isArray(a)||(a=t(a)?f(a).get():[a]),f.each(a,function(e,c){var k={},g,h,j,m,l;"object"===f.type(c)&&(c.nodeType&&(c=f(c)),t(c)?(k={href:c.data("fancybox-href")||c.attr("href"),title:c.data("fancybox-title")||c.attr("title"),isDom:!0,element:c},f.metadata&&f.extend(!0,k,c.metadata())):k=c);g=d.href||k.href||(q(c)?c:null);h=d.title!==v?d.title:k.title||"";m=(j=d.content||k.content)?"html":d.type||k.type;!m&&k.isDom&&(m=c.data("fancybox-type"),m||(m=(m=c.prop("class").match(/fancybox\.(\w+)/))?m[1]:null));q(g)&&(m||(b.isImage(g)?m="image":b.isSWF(g)?m="swf":"#"===g.charAt(0)?m="inline":q(c)&&(m="html",j=c)),"ajax"===m&&(l=g.split(/\s+/,2),g=l.shift(),l=l.shift()));j||("inline"===m?g?j=f(q(g)?g.replace(/.*(?=#[^\s]+$)/,""):g):k.isDom&&(j=c):"html"===m?j=g:!m&&(!g&&k.isDom)&&(m="inline",j=c));f.extend(k,{href:g,type:m,content:j,title:h,selector:l});a[e]=k}),b.opts=f.extend(!0,{},b.defaults,d),d.keys!==v&&(b.opts.keys=d.keys?f.extend({},b.defaults.keys,d.keys):!1),b.group=a,b._start(b.opts.index)},cancel:function(){var a=b.coming;a&&!1!==b.trigger("onCancel")&&(b.hideLoading(),b.ajaxLoad&&b.ajaxLoad.abort(),b.ajaxLoad=null,b.imgPreload&&(b.imgPreload.onload=b.imgPreload.onerror=null),a.wrap&&a.wrap.stop(!0,!0).trigger("onReset").remove(),b.coming=null,b.current||b._afterZoomOut(a))},close:function(a){b.cancel();!1!==b.trigger("beforeClose")&&(b.unbindEvents(),b.isActive&&(!b.isOpen||!0===a?(f(".fancybox-wrap").stop(!0).trigger("onReset").remove(),b._afterZoomOut()):(b.isOpen=b.isOpened=!1,b.isClosing=!0,f(".fancybox-item, .fancybox-nav").remove(),b.wrap.stop(!0,!0).removeClass("fancybox-opened"),b.transitions[b.current.closeMethod]())))},play:function(a){var d=function(){clearTimeout(b.player.timer)},e=function(){d();b.current&&b.player.isActive&&(b.player.timer=setTimeout(b.next,b.current.playSpeed))},c=function(){d();p.unbind(".player");b.player.isActive=!1;b.trigger("onPlayEnd")};if(!0===a||!b.player.isActive&&!1!==a){if(b.current&&(b.current.loop||b.current.index<b.group.length-1))b.player.isActive=!0,p.bind({"onCancel.player beforeClose.player":c,"onUpdate.player":e,"beforeLoad.player":d}),e(),b.trigger("onPlayStart")}else c()},next:function(a){var d=b.current;d&&(q(a)||(a=d.direction.next),b.jumpto(d.index+1,a,"next"))},prev:function(a){var d=b.current;d&&(q(a)||(a=d.direction.prev),b.jumpto(d.index-1,a,"prev"))},jumpto:function(a,d,e){var c=b.current;c&&(a=l(a),b.direction=d||c.direction[a>=c.index?"next":"prev"],b.router=e||"jumpto",c.loop&&(0>a&&(a=c.group.length+a%c.group.length),a%=c.group.length),c.group[a]!==v&&(b.cancel(),b._start(a)))},reposition:function(a,d){var e=b.current,c=e?e.wrap:null,k;c&&(k=b._getPosition(d),a&&"scroll"===a.type?(delete k.position,c.stop(!0,!0).animate(k,200)):(c.css(k),e.pos=f.extend({},e.dim,k)))},update:function(a){var d=a&&a.type,e=!d||"orientationchange"===d;e&&(clearTimeout(B),B=null);b.isOpen&&!B&&(B=setTimeout(function(){var c=b.current;c&&!b.isClosing&&(b.wrap.removeClass("fancybox-tmp"),(e||"load"===d||"resize"===d&&c.autoResize)&&b._setDimension(),"scroll"===d&&c.canShrink||b.reposition(a),b.trigger("onUpdate"),B=null)},e&&!s?0:300))},toggle:function(a){b.isOpen&&(b.current.fitToView="boolean"===f.type(a)?a:!b.current.fitToView,s&&(b.wrap.removeAttr("style").addClass("fancybox-tmp"),b.trigger("onUpdate")),b.update())},hideLoading:function(){p.unbind(".loading");f("#fancybox-loading").remove()},showLoading:function(){var a,d;b.hideLoading();a=f('<div id="fancybox-loading"><div></div></div>').click(b.cancel).appendTo("body");p.bind("keydown.loading",function(a){if(27===(a.which||a.keyCode))a.preventDefault(),b.cancel()});b.defaults.fixed||(d=b.getViewport(),a.css({position:"absolute",top:0.5*d.h+d.y,left:0.5*d.w+d.x}))},getViewport:function(){var a=b.current&&b.current.locked||!1,d={x:n.scrollLeft(),y:n.scrollTop()};a?(d.w=a[0].clientWidth,d.h=a[0].clientHeight):(d.w=s&&r.innerWidth?r.innerWidth:n.width(),d.h=s&&r.innerHeight?r.innerHeight:n.height());return d},unbindEvents:function(){b.wrap&&t(b.wrap)&&b.wrap.unbind(".fb");p.unbind(".fb");n.unbind(".fb")},bindEvents:function(){var a=b.current,d;a&&(n.bind("orientationchange.fb"+(s?"":" resize.fb")+(a.autoCenter&&!a.locked?" scroll.fb":""),b.update),(d=a.keys)&&p.bind("keydown.fb",function(e){var c=e.which||e.keyCode,k=e.target||e.srcElement;if(27===c&&b.coming)return!1;!e.ctrlKey&&(!e.altKey&&!e.shiftKey&&!e.metaKey&&(!k||!k.type&&!f(k).is("[contenteditable]")))&&f.each(d,function(d,k){if(1<a.group.length&&k[c]!==v)return b[d](k[c]),e.preventDefault(),!1;if(-1<f.inArray(c,k))return b[d](),e.preventDefault(),!1})}),f.fn.mousewheel&&a.mouseWheel&&b.wrap.bind("mousewheel.fb",function(d,c,k,g){for(var h=f(d.target||null),j=!1;h.length&&!j&&!h.is(".fancybox-skin")&&!h.is(".fancybox-wrap");)j=h[0]&&!(h[0].style.overflow&&"hidden"===h[0].style.overflow)&&(h[0].clientWidth&&h[0].scrollWidth>h[0].clientWidth||h[0].clientHeight&&h[0].scrollHeight>h[0].clientHeight),h=f(h).parent();if(0!==c&&!j&&1<b.group.length&&!a.canShrink){if(0<g||0<k)b.prev(0<g?"down":"left");else if(0>g||0>k)b.next(0>g?"up":"right");d.preventDefault()}}))},trigger:function(a,d){var e,c=d||b.coming||b.current;if(c){f.isFunction(c[a])&&(e=c[a].apply(c,Array.prototype.slice.call(arguments,1)));if(!1===e)return!1;c.helpers&&f.each(c.helpers,function(d,e){if(e&&b.helpers[d]&&f.isFunction(b.helpers[d][a]))b.helpers[d][a](f.extend(!0,{},b.helpers[d].defaults,e),c)});p.trigger(a)}},isImage:function(a){return q(a)&&a.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)},isSWF:function(a){return q(a)&&a.match(/\.(swf)((\?|#).*)?$/i)},_start:function(a){var d={},e,c;a=l(a);e=b.group[a]||null;if(!e)return!1;d=f.extend(!0,{},b.opts,e);e=d.margin;c=d.padding;"number"===f.type(e)&&(d.margin=[e,e,e,e]);"number"===f.type(c)&&(d.padding=[c,c,c,c]);d.modal&&f.extend(!0,d,{closeBtn:!1,closeClick:!1,nextClick:!1,arrows:!1,mouseWheel:!1,keys:null,helpers:{overlay:{closeClick:!1}}});d.autoSize&&(d.autoWidth=d.autoHeight=!0);"auto"===d.width&&(d.autoWidth=!0);"auto"===d.height&&(d.autoHeight=!0);d.group=b.group;d.index=a;b.coming=d;if(!1===b.trigger("beforeLoad"))b.coming=null;else{c=d.type;e=d.href;if(!c)return b.coming=null,b.current&&b.router&&"jumpto"!==b.router?(b.current.index=a,b[b.router](b.direction)):!1;b.isActive=!0;if("image"===c||"swf"===c)d.autoHeight=d.autoWidth=!1,d.scrolling="visible";"image"===c&&(d.aspectRatio=!0);"iframe"===c&&s&&(d.scrolling="scroll");d.wrap=f(d.tpl.wrap).addClass("fancybox-"+(s?"mobile":"desktop")+" fancybox-type-"+c+" fancybox-tmp "+d.wrapCSS).appendTo(d.parent||"body");f.extend(d,{skin:f(".fancybox-skin",d.wrap),outer:f(".fancybox-outer",d.wrap),inner:f(".fancybox-inner",d.wrap)});f.each(["Top","Right","Bottom","Left"],function(a,b){d.skin.css("padding"+b,w(d.padding[a]))});b.trigger("onReady");if("inline"===c||"html"===c){if(!d.content||!d.content.length)return b._error("content")}else if(!e)return b._error("href");"image"===c?b._loadImage():"ajax"===c?b._loadAjax():"iframe"===c?b._loadIframe():b._afterLoad()}},_error:function(a){f.extend(b.coming,{type:"html",autoWidth:!0,autoHeight:!0,minWidth:0,minHeight:0,scrolling:"no",hasError:a,content:b.coming.tpl.error});b._afterLoad()},_loadImage:function(){var a=b.imgPreload=new Image;a.onload=function(){this.onload=this.onerror=null;b.coming.width=this.width/b.opts.pixelRatio;b.coming.height=this.height/b.opts.pixelRatio;b._afterLoad()};a.onerror=function(){this.onload=this.onerror=null;b._error("image")};a.src=b.coming.href;!0!==a.complete&&b.showLoading()},_loadAjax:function(){var a=b.coming;b.showLoading();b.ajaxLoad=f.ajax(f.extend({},a.ajax,{url:a.href,error:function(a,e){b.coming&&"abort"!==e?b._error("ajax",a):b.hideLoading()},success:function(d,e){"success"===e&&(a.content=d,b._afterLoad())}}))},_loadIframe:function(){var a=b.coming,d=f(a.tpl.iframe.replace(/\{rnd\}/g,(new Date).getTime())).attr("scrolling",s?"auto":a.iframe.scrolling).attr("src",a.href);f(a.wrap).bind("onReset",function(){try{f(this).find("iframe").hide().attr("src","//about:blank").end().empty()}catch(a){}});a.iframe.preload&&(b.showLoading(),d.one("load",function(){f(this).data("ready",1);s||f(this).bind("load.fb",b.update);f(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show();b._afterLoad()}));a.content=d.appendTo(a.inner);a.iframe.preload||b._afterLoad()},_preloadImages:function(){var a=b.group,d=b.current,e=a.length,c=d.preload?Math.min(d.preload,e-1):0,f,g;for(g=1;g<=c;g+=1)f=a[(d.index+g)%e],"image"===f.type&&f.href&&((new Image).src=f.href)},_afterLoad:function(){var a=b.coming,d=b.current,e,c,k,g,h;b.hideLoading();if(a&&!1!==b.isActive)if(!1===b.trigger("afterLoad",a,d))a.wrap.stop(!0).trigger("onReset").remove(),b.coming=null;else{d&&(b.trigger("beforeChange",d),d.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove());b.unbindEvents();e=a.content;c=a.type;k=a.scrolling;f.extend(b,{wrap:a.wrap,skin:a.skin,outer:a.outer,inner:a.inner,current:a,previous:d});g=a.href;switch(c){case"inline":case"ajax":case"html":a.selector?e=f("<div>").html(e).find(a.selector):t(e)&&(e.data("fancybox-placeholder")||e.data("fancybox-placeholder",f('<div class="fancybox-placeholder"></div>').insertAfter(e).hide()),e=e.show().detach(),a.wrap.bind("onReset",function(){f(this).find(e).length&&e.hide().replaceAll(e.data("fancybox-placeholder")).data("fancybox-placeholder",!1)}));break;case"image":e=a.tpl.image.replace("{href}",g);break;case"swf":e='<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="'+g+'"></param>',h="",f.each(a.swf,function(a,b){e+='<param name="'+a+'" value="'+b+'"></param>';h+=" "+a+'="'+b+'"'}),e+='<embed src="'+g+'" type="application/x-shockwave-flash" width="100%" height="100%"'+h+"></embed></object>"}(!t(e)||!e.parent().is(a.inner))&&a.inner.append(e);b.trigger("beforeShow");a.inner.css("overflow","yes"===k?"scroll":"no"===k?"hidden":k);b._setDimension();b.reposition();b.isOpen=!1;b.coming=null;b.bindEvents();if(b.isOpened){if(d.prevMethod)b.transitions[d.prevMethod]()}else f(".fancybox-wrap").not(a.wrap).stop(!0).trigger("onReset").remove();b.transitions[b.isOpened?a.nextMethod:a.openMethod]();b._preloadImages()}},_setDimension:function(){var a=b.getViewport(),d=0,e=!1,c=!1,e=b.wrap,k=b.skin,g=b.inner,h=b.current,c=h.width,j=h.height,m=h.minWidth,u=h.minHeight,n=h.maxWidth,p=h.maxHeight,s=h.scrolling,q=h.scrollOutside?h.scrollbarWidth:0,x=h.margin,y=l(x[1]+x[3]),r=l(x[0]+x[2]),v,z,t,C,A,F,B,D,H;e.add(k).add(g).width("auto").height("auto").removeClass("fancybox-tmp");x=l(k.outerWidth(!0)-k.width());v=l(k.outerHeight(!0)-k.height());z=y+x;t=r+v;C=E(c)?(a.w-z)*l(c)/100:c;A=E(j)?(a.h-t)*l(j)/100:j;if("iframe"===h.type){if(H=h.content,h.autoHeight&&1===H.data("ready"))try{H[0].contentWindow.document.location&&(g.width(C).height(9999),F=H.contents().find("body"),q&&F.css("overflow-x","hidden"),A=F.outerHeight(!0))}catch(G){}}else if(h.autoWidth||h.autoHeight)g.addClass("fancybox-tmp"),h.autoWidth||g.width(C),h.autoHeight||g.height(A),h.autoWidth&&(C=g.width()),h.autoHeight&&(A=g.height()),g.removeClass("fancybox-tmp");c=l(C);j=l(A);D=C/A;m=l(E(m)?l(m,"w")-z:m);n=l(E(n)?l(n,"w")-z:n);u=l(E(u)?l(u,"h")-t:u);p=l(E(p)?l(p,"h")-t:p);F=n;B=p;h.fitToView&&(n=Math.min(a.w-z,n),p=Math.min(a.h-t,p));z=a.w-y;r=a.h-r;h.aspectRatio?(c>n&&(c=n,j=l(c/D)),j>p&&(j=p,c=l(j*D)),c<m&&(c=m,j=l(c/D)),j<u&&(j=u,c=l(j*D))):(c=Math.max(m,Math.min(c,n)),h.autoHeight&&"iframe"!==h.type&&(g.width(c),j=g.height()),j=Math.max(u,Math.min(j,p)));if(h.fitToView)if(g.width(c).height(j),e.width(c+x),a=e.width(),y=e.height(),h.aspectRatio)for(;(a>z||y>r)&&(c>m&&j>u)&&!(19<d++);)j=Math.max(u,Math.min(p,j-10)),c=l(j*D),c<m&&(c=m,j=l(c/D)),c>n&&(c=n,j=l(c/D)),g.width(c).height(j),e.width(c+x),a=e.width(),y=e.height();else c=Math.max(m,Math.min(c,c-(a-z))),j=Math.max(u,Math.min(j,j-(y-r)));q&&("auto"===s&&j<A&&c+x+q<z)&&(c+=q);g.width(c).height(j);e.width(c+x);a=e.width();y=e.height();e=(a>z||y>r)&&c>m&&j>u;c=h.aspectRatio?c<F&&j<B&&c<C&&j<A:(c<F||j<B)&&(c<C||j<A);f.extend(h,{dim:{width:w(a),height:w(y)},origWidth:C,origHeight:A,canShrink:e,canExpand:c,wPadding:x,hPadding:v,wrapSpace:y-k.outerHeight(!0),skinSpace:k.height()-j});!H&&(h.autoHeight&&j>u&&j<p&&!c)&&g.height("auto")},_getPosition:function(a){var d=b.current,e=b.getViewport(),c=d.margin,f=b.wrap.width()+c[1]+c[3],g=b.wrap.height()+c[0]+c[2],c={position:"absolute",top:c[0],left:c[3]};d.autoCenter&&d.fixed&&!a&&g<=e.h&&f<=e.w?c.position="fixed":d.locked||(c.top+=e.y,c.left+=e.x);c.top=w(Math.max(c.top,c.top+(e.h-g)*d.topRatio));c.left=w(Math.max(c.left,c.left+(e.w-f)*d.leftRatio));return c},_afterZoomIn:function(){var a=b.current;a&&(b.isOpen=b.isOpened=!0,b.wrap.css("overflow","visible").addClass("fancybox-opened"),b.update(),(a.closeClick||a.nextClick&&1<b.group.length)&&b.inner.css("cursor","pointer").bind("click.fb",function(d){!f(d.target).is("a")&&!f(d.target).parent().is("a")&&(d.preventDefault(),b[a.closeClick?"close":"next"]())}),a.closeBtn&&f(a.tpl.closeBtn).appendTo(b.skin).bind("click.fb",function(a){a.preventDefault();b.close()}),a.arrows&&1<b.group.length&&((a.loop||0<a.index)&&f(a.tpl.prev).appendTo(b.outer).bind("click.fb",b.prev),(a.loop||a.index<b.group.length-1)&&f(a.tpl.next).appendTo(b.outer).bind("click.fb",b.next)),b.trigger("afterShow"),!a.loop&&a.index===a.group.length-1?b.play(!1):b.opts.autoPlay&&!b.player.isActive&&(b.opts.autoPlay=!1,b.play()))},_afterZoomOut:function(a){a=a||b.current;f(".fancybox-wrap").trigger("onReset").remove();f.extend(b,{group:{},opts:{},router:!1,current:null,isActive:!1,isOpened:!1,isOpen:!1,isClosing:!1,wrap:null,skin:null,outer:null,inner:null});b.trigger("afterClose",a)}});b.transitions={getOrigPosition:function(){var a=b.current,d=a.element,e=a.orig,c={},f=50,g=50,h=a.hPadding,j=a.wPadding,m=b.getViewport();!e&&(a.isDom&&d.is(":visible"))&&(e=d.find("img:first"),e.length||(e=d));t(e)?(c=e.offset(),e.is("img")&&(f=e.outerWidth(),g=e.outerHeight())):(c.top=m.y+(m.h-g)*a.topRatio,c.left=m.x+(m.w-f)*a.leftRatio);if("fixed"===b.wrap.css("position")||a.locked)c.top-=m.y,c.left-=m.x;return c={top:w(c.top-h*a.topRatio),left:w(c.left-j*a.leftRatio),width:w(f+j),height:w(g+h)}},step:function(a,d){var e,c,f=d.prop;c=b.current;var g=c.wrapSpace,h=c.skinSpace;if("width"===f||"height"===f)e=d.end===d.start?1:(a-d.start)/(d.end-d.start),b.isClosing&&(e=1-e),c="width"===f?c.wPadding:c.hPadding,c=a-c,b.skin[f](l("width"===f?c:c-g*e)),b.inner[f](l("width"===f?c:c-g*e-h*e))},zoomIn:function(){var a=b.current,d=a.pos,e=a.openEffect,c="elastic"===e,k=f.extend({opacity:1},d);delete k.position;c?(d=this.getOrigPosition(),a.openOpacity&&(d.opacity=0.1)):"fade"===e&&(d.opacity=0.1);b.wrap.css(d).animate(k,{duration:"none"===e?0:a.openSpeed,easing:a.openEasing,step:c?this.step:null,complete:b._afterZoomIn})},zoomOut:function(){var a=b.current,d=a.closeEffect,e="elastic"===d,c={opacity:0.1};e&&(c=this.getOrigPosition(),a.closeOpacity&&(c.opacity=0.1));b.wrap.animate(c,{duration:"none"===d?0:a.closeSpeed,easing:a.closeEasing,step:e?this.step:null,complete:b._afterZoomOut})},changeIn:function(){var a=b.current,d=a.nextEffect,e=a.pos,c={opacity:1},f=b.direction,g;e.opacity=0.1;"elastic"===d&&(g="down"===f||"up"===f?"top":"left","down"===f||"right"===f?(e[g]=w(l(e[g])-200),c[g]="+=200px"):(e[g]=w(l(e[g])+200),c[g]="-=200px"));"none"===d?b._afterZoomIn():b.wrap.css(e).animate(c,{duration:a.nextSpeed,easing:a.nextEasing,complete:b._afterZoomIn})},changeOut:function(){var a=b.previous,d=a.prevEffect,e={opacity:0.1},c=b.direction;"elastic"===d&&(e["down"===c||"up"===c?"top":"left"]=("up"===c||"left"===c?"-":"+")+"=200px");a.wrap.animate(e,{duration:"none"===d?0:a.prevSpeed,easing:a.prevEasing,complete:function(){f(this).trigger("onReset").remove()}})}};b.helpers.overlay={defaults:{closeClick:!0,speedOut:200,showEarly:!0,css:{},locked:!s,fixed:!0},overlay:null,fixed:!1,el:f("html"),create:function(a){a=f.extend({},this.defaults,a);this.overlay&&this.close();this.overlay=f('<div class="fancybox-overlay"></div>').appendTo(b.coming?b.coming.parent:a.parent);this.fixed=!1;a.fixed&&b.defaults.fixed&&(this.overlay.addClass("fancybox-overlay-fixed"),this.fixed=!0)},open:function(a){var d=this;a=f.extend({},this.defaults,a);this.overlay?this.overlay.unbind(".overlay").width("auto").height("auto"):this.create(a);this.fixed||(n.bind("resize.overlay",f.proxy(this.update,this)),this.update());a.closeClick&&this.overlay.bind("click.overlay",function(a){if(f(a.target).hasClass("fancybox-overlay"))return b.isActive?b.close():d.close(),!1});this.overlay.css(a.css).show()},close:function(){var a,b;n.unbind("resize.overlay");this.el.hasClass("fancybox-lock")&&(f(".fancybox-margin").removeClass("fancybox-margin"),a=n.scrollTop(),b=n.scrollLeft(),this.el.removeClass("fancybox-lock"),n.scrollTop(a).scrollLeft(b));f(".fancybox-overlay").remove().hide();f.extend(this,{overlay:null,fixed:!1})},update:function(){var a="100%",b;this.overlay.width(a).height("100%");I?(b=Math.max(G.documentElement.offsetWidth,G.body.offsetWidth),p.width()>b&&(a=p.width())):p.width()>n.width()&&(a=p.width());this.overlay.width(a).height(p.height())},onReady:function(a,b){var e=this.overlay;f(".fancybox-overlay").stop(!0,!0);e||this.create(a);a.locked&&(this.fixed&&b.fixed)&&(e||(this.margin=p.height()>n.height()?f("html").css("margin-right").replace("px",""):!1),b.locked=this.overlay.append(b.wrap),b.fixed=!1);!0===a.showEarly&&this.beforeShow.apply(this,arguments)},beforeShow:function(a,b){var e,c;b.locked&&(!1!==this.margin&&(f("*").filter(function(){return"fixed"===f(this).css("position")&&!f(this).hasClass("fancybox-overlay")&&!f(this).hasClass("fancybox-wrap")}).addClass("fancybox-margin"),this.el.addClass("fancybox-margin")),e=n.scrollTop(),c=n.scrollLeft(),this.el.addClass("fancybox-lock"),n.scrollTop(e).scrollLeft(c));this.open(a)},onUpdate:function(){this.fixed||this.update()},afterClose:function(a){this.overlay&&!b.coming&&this.overlay.fadeOut(a.speedOut,f.proxy(this.close,this))}};b.helpers.title={defaults:{type:"float",position:"bottom"},beforeShow:function(a){var d=b.current,e=d.title,c=a.type;f.isFunction(e)&&(e=e.call(d.element,d));if(q(e)&&""!==f.trim(e)){d=f('<div class="fancybox-title fancybox-title-'+c+'-wrap">'+e+"</div>");switch(c){case"inside":c=b.skin;break;case"outside":c=b.wrap;break;case"over":c=b.inner;break;default:c=b.skin,d.appendTo("body"),I&&d.width(d.width()),d.wrapInner('<span class="child"></span>'),b.current.margin[2]+=Math.abs(l(d.css("margin-bottom")))}d["top"===a.position?"prependTo":"appendTo"](c)}}};f.fn.fancybox=function(a){var d,e=f(this),c=this.selector||"",k=function(g){var h=f(this).blur(),j=d,k,l;!g.ctrlKey&&(!g.altKey&&!g.shiftKey&&!g.metaKey)&&!h.is(".fancybox-wrap")&&(k=a.groupAttr||"data-fancybox-group",l=h.attr(k),l||(k="rel",l=h.get(0)[k]),l&&(""!==l&&"nofollow"!==l)&&(h=c.length?f(c):e,h=h.filter("["+k+'="'+l+'"]'),j=h.index(this)),a.index=j,!1!==b.open(h,a)&&g.preventDefault())};a=a||{};d=a.index||0;!c||!1===a.live?e.unbind("click.fb-start").bind("click.fb-start",k):p.undelegate(c,"click.fb-start").delegate(c+":not('.fancybox-item, .fancybox-nav')","click.fb-start",k);this.filter("[data-fancybox-start=1]").trigger("click");return this};p.ready(function(){var a,d;f.scrollbarWidth===v&&(f.scrollbarWidth=function(){var a=f('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),b=a.children(),b=b.innerWidth()-b.height(99).innerWidth();a.remove();return b});if(f.support.fixedPosition===v){a=f.support;d=f('<div style="position:fixed;top:20px;"></div>').appendTo("body");var e=20===d[0].offsetTop||15===d[0].offsetTop;d.remove();a.fixedPosition=e}f.extend(b.defaults,{scrollbarWidth:f.scrollbarWidth(),fixed:f.support.fixedPosition,parent:f("body")});a=f(r).width();J.addClass("fancybox-lock-test");d=f(r).width();J.removeClass("fancybox-lock-test");f("<style type='text/css'>.fancybox-margin{margin-right:"+(d-a)+"px;}</style>").appendTo("head")})})(window,document,jQuery);
;/*!
 * The Final Countdown for jQuery v2.0.5 (http://hilios.github.io/jQuery.countdown/)
 * Copyright (c) 2015 Edson Hilios
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){"use strict";function b(a){if(a instanceof Date)return a;if(String(a).match(g))return String(a).match(/^[0-9]*$/)&&(a=Number(a)),String(a).match(/\-/)&&(a=String(a).replace(/\-/g,"/")),new Date(a);throw new Error("Couldn't cast `"+a+"` to a date object.")}function c(a){var b=a.toString().replace(/([.?*+^$[\]\\(){}|-])/g,"\\$1");return new RegExp(b)}function d(a){return function(b){var d=b.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);if(d)for(var f=0,g=d.length;g>f;++f){var h=d[f].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),j=c(h[0]),k=h[1]||"",l=h[3]||"",m=null;h=h[2],i.hasOwnProperty(h)&&(m=i[h],m=Number(a[m])),null!==m&&("!"===k&&(m=e(l,m)),""===k&&10>m&&(m="0"+m.toString()),b=b.replace(j,m.toString()))}return b=b.replace(/%%/,"%")}}function e(a,b){var c="s",d="";return a&&(a=a.replace(/(:|;|\s)/gi,"").split(/\,/),1===a.length?c=a[0]:(d=a[0],c=a[1])),1===Math.abs(b)?d:c}var f=[],g=[],h={precision:100,elapse:!1};g.push(/^[0-9]*$/.source),g.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source),g.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source),g=new RegExp(g.join("|"));var i={Y:"years",m:"months",w:"weeks",d:"days",D:"totalDays",H:"hours",M:"minutes",S:"seconds"},j=function(b,c,d){this.el=b,this.$el=a(b),this.interval=null,this.offset={},this.options=a.extend({},h),this.instanceNumber=f.length,f.push(this),this.$el.data("countdown-instance",this.instanceNumber),d&&("function"==typeof d?(this.$el.on("update.countdown",d),this.$el.on("stoped.countdown",d),this.$el.on("finish.countdown",d)):this.options=a.extend({},h,d)),this.setFinalDate(c),this.start()};a.extend(j.prototype,{start:function(){null!==this.interval&&clearInterval(this.interval);var a=this;this.update(),this.interval=setInterval(function(){a.update.call(a)},this.options.precision)},stop:function(){clearInterval(this.interval),this.interval=null,this.dispatchEvent("stoped")},toggle:function(){this.interval?this.stop():this.start()},pause:function(){this.stop()},resume:function(){this.start()},remove:function(){this.stop.call(this),f[this.instanceNumber]=null,delete this.$el.data().countdownInstance},setFinalDate:function(a){this.finalDate=b(a)},update:function(){if(0===this.$el.closest("html").length)return void this.remove();var b,c=void 0!==a._data(this.el,"events"),d=new Date;b=this.finalDate.getTime()-d.getTime(),b=Math.ceil(b/1e3),b=!this.options.elapse&&0>b?0:Math.abs(b),this.totalSecsLeft!==b&&c&&(this.totalSecsLeft=b,this.elapsed=d>=this.finalDate,this.offset={seconds:this.totalSecsLeft%60,minutes:Math.floor(this.totalSecsLeft/60)%60,hours:Math.floor(this.totalSecsLeft/60/60)%24,days:Math.floor(this.totalSecsLeft/60/60/24)%7,totalDays:Math.floor(this.totalSecsLeft/60/60/24),weeks:Math.floor(this.totalSecsLeft/60/60/24/7),months:Math.floor(this.totalSecsLeft/60/60/24/30),years:Math.floor(this.totalSecsLeft/60/60/24/365)},this.options.elapse||0!==this.totalSecsLeft?this.dispatchEvent("update"):(this.stop(),this.dispatchEvent("finish")))},dispatchEvent:function(b){var c=a.Event(b+".countdown");c.finalDate=this.finalDate,c.elapsed=this.elapsed,c.offset=a.extend({},this.offset),c.strftime=d(this.offset),this.$el.trigger(c)}}),a.fn.countdown=function(){var b=Array.prototype.slice.call(arguments,0);return this.each(function(){var c=a(this).data("countdown-instance");if(void 0!==c){var d=f[c],e=b[0];j.prototype.hasOwnProperty(e)?d[e].apply(d,b.slice(1)):null===String(e).match(/^[$A-Z_][0-9A-Z_$]*$/i)?(d.setFinalDate.call(d,e),d.start()):a.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi,e))}else new j(this,b[0],b[1])})}});
(function ($) {
	$(document).on('ready', function(){					
		$('.countdown-slider .slider .product-countdown').each(function(event){
			var $this = $(this);
			var parent_target = $this.parents().eq(1);
			var item_target 	= parent_target.find( '.item-price' );
			var $current_time = new Date().getTime();
			var $price				= $(this).data( 'price' ); 
			var $cd_date			= $(this).data( 'date' ); 
			var $start_time 	= $(this).data('starttime') * 1000;
			var $countdown_time = $(this).data('cdtime') * 1000;
			var $austDay 			= new Date( $cd_date * 1000 );	
			if( $start_time > $current_time  ){
				$this.remove();
				return ;
			}
			if( $countdown_time > 0 && $current_time > $countdown_time ){
				$this.remove();
				return ;
			}
			if( $countdown_time <= 0 ){
				$this.remove();
				return ;
			}
			$this.countdown($austDay, function(event) {
				$(this).html(
					event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">D</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span><span class="countdown-period">H</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span><span class="countdown-period">M</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span><span class="countdown-period">S</span></span></span>')
				);
			}).on('finish.countdown', function(event){
				$(this).hide('slow', function(){ $(this).remove(); });	
				item_target.find( '> span' ).hide('slow', function(){ item_target.find( '> span' ).remove();
				item_target.append( '<span><span class="amount">' + $price + '</span></span>' ); });	
			});
		});
		
		$('.countdown-slider3 .slider .product-countdown').each(function(event){
			var $this = $(this);
			var parent_target = $this.parents().eq(1);
			var item_target 	= parent_target.find( '.item-price' );
			var $current_time = new Date().getTime();
			var $price				= $(this).data( 'price' ); 
			var $cd_date			= $(this).data( 'date' ); 
			var $start_time 	= $(this).data('starttime') * 1000;
			var $countdown_time = $(this).data('cdtime') * 1000;
			var $austDay 			= new Date( $cd_date * 1000 );	
			if( $start_time > $current_time  ){
				$this.remove();
				return ;
			}
			if( $countdown_time > 0 && $current_time > $countdown_time ){
				$this.remove();
				return ;
			}
			if( $countdown_time <= 0 ){
				$this.remove();
				return ;
			}
			$this.countdown($austDay, function(event) {
				$(this).html(
					event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">D</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span><span class="countdown-period">H</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span><span class="countdown-period">M</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span><span class="countdown-period">S</span></span></span>')
				);
			}).on('finish.countdown', function(event){
				$(this).hide('slow', function(){ $(this).remove(); });	
				item_target.find( '> span' ).hide('slow', function(){ item_target.find( '> span' ).remove();
				item_target.append( '<span><span class="amount">' + $price + '</span></span>' ); });	
			});
		});
		
		$('.countdown-slider2 .slider .product-countdown').each(function(event){
			var $this = $(this);
			var parent_target = $this.parents().eq(1);
			var item_target 	= parent_target.find( '.item-price' );
			var $current_time = new Date().getTime();
			var $price				= $(this).data( 'price' ); 
			var $cd_date			= $(this).data( 'date' ); 
			var $start_time 	= $(this).data('starttime') * 1000;
			var $countdown_time = $(this).data('cdtime') * 1000;
			var $austDay 			= new Date( $cd_date *1000 );	
			if( $start_time > $current_time  ){
				$this.remove();
				return ;
			}
			if( $countdown_time > 0 && $current_time > $countdown_time ){
				$this.remove();
				return ;
			}
			if( $countdown_time <= 0 ){
				$this.remove();
				return ;
			}
			$this.countdown($austDay, function(event) {
				//var totalHours = event.offset.austDay * 24 + event.offset.hours;
				$(this).html(
					event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-amount">%H Hours left</span></span>')
				);
			}).on('finish.countdown', function(event){
				$(this).hide('slow', function(){ $(this).remove(); });	
				item_target.find( '> span' ).hide('slow', function(){ item_target.find( '> span' ).remove();
				item_target.append( '<span><span class="amount">' + $price + '</span></span>' ); });	
			});
		});
		
		$('.countdown-slider5 .slider .product-countdown').each(function(event){
			var $this = $(this);
			var parent_target = $this.parents().eq(1);
			var item_target 	= parent_target.find( '.item-price' );
			var $current_time = new Date().getTime();
			var $price				= $(this).data( 'price' ); 
			var $cd_date			= $(this).data( 'date' ); 
			var $start_time 	= $(this).data('starttime') * 1000;
			var $countdown_time = $(this).data('cdtime') * 1000;
			var $austDay 			= new Date( $cd_date * 1000 );	
			if( $start_time > $current_time  ){
				$this.remove();
				return ;
			}
			if( $countdown_time > 0 && $current_time > $countdown_time ){
				$this.remove();
				return ;
			}
			if( $countdown_time <= 0 ){
				$this.remove();
				return ;
			}
			$this.countdown($austDay, function(event) {
				$(this).html(
					event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">days</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span><span class="countdown-period">hours</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span><span class="countdown-period">mins</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span><span class="countdown-period">secs</span></span></span>')
				);
			}).on('finish.countdown', function(event){
				$(this).hide('slow', function(){ $(this).remove(); });	
				item_target.find( '> span' ).hide('slow', function(){ item_target.find( '> span' ).remove();
				item_target.append( '<span><span class="amount">' + $price + '</span></span>' ); });	
			});
		});
		
		$('.countdown-slider6 .slider .product-countdown').each(function(event){
			var $this = $(this);
			var parent_target = $this.parents().eq(1);
			var item_target 	= parent_target.find( '.item-price' );
			var $current_time = new Date().getTime();
			var $price				= $(this).data( 'price' ); 
			var $cd_date			= $(this).data( 'date' ); 
			var $start_time 	= $(this).data('starttime') * 1000;
			var $countdown_time = $(this).data('cdtime') * 1000;
			var $austDay 			= new Date( $cd_date * 1000 );	
			if( $start_time > $current_time  ){
				$this.remove();
				return ;
			}
			if( $countdown_time > 0 && $current_time > $countdown_time ){
				$this.remove();
				return ;
			}
			if( $countdown_time <= 0 ){
				$this.remove();
				return ;
			}
			$this.countdown($austDay, function(event) {
				$(this).html(
					event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">days</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span><span class="countdown-period">hours</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span><span class="countdown-period">mins</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span><span class="countdown-period">secs</span></span></span>')
				);
			}).on('finish.countdown', function(event){
				$(this).hide('slow', function(){ $(this).remove(); });	
				item_target.find( '> span' ).hide('slow', function(){ item_target.find( '> span' ).remove();
				item_target.append( '<span><span class="amount">' + $price + '</span></span>' ); });	
			});
		});		
		
		$('.sw_tab_countdown2 .product-countdown').each(function(event){
			$this = $(this);
			$id = this.id;			
			$current_time 	= new Date().getTime();
			$start_time 	= $(this).data('starttime');
			$countdown_time = $(this).data('cdtime');
			var $austDay 	= new Date();
			$austDay 		= new Date( $countdown_time *1000 );	
			if( $start_time > $current_time  ){
				$this.remove();
				return ;
			}
			if( $countdown_time.length > 0 && $current_time > $countdown_time ){
				$this.remove();
				return ;
			}
			if( $countdown_time.length <= 0 ){
				$this.remove();
				return ;
			}
			$this.countdown($austDay, function(event) {
				$(this).html(
					event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">D</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span><span class="countdown-period">H</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span><span class="countdown-period">M</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span><span class="countdown-period">S</span></span></span>')
				);
			}).on('finish.countdown', function(event){
				$(this).remove();
				$id = $(this).data( 'id' );
				$target = this;
				$(this).hide('slow', function(){ $(this).remove(); });	
				$price = $(this).data( 'price' );
				$('#' + $id + ' .item-price > span').hide('slow', function(){ $('#' + $id + ' .item-price > span').remove(); });					
				$('#' + $id + ' .item-price' ).append( '<span><span class="amount">' + $price + '</span></span>' );
			});
		});	
	});
	$('.banner-countdown').each(function(event){
		$this = $(this);
		$current_time 	= new Date().getTime();
		$countdown_time = $(this).data('cdtime');
		var $austDay 	= new Date();
		$austDay 		= new Date( $countdown_time * 1000 );	
		if( $countdown_time.length > 0 && $current_time > $countdown_time ){
			$this.parent().hide();
			return ;
		}
		if( $countdown_time.length <= 0 ){
				$this.parent().hide();
			return ;
		}
		$this.countdown($austDay, function(event) {
			$(this).html(
				event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">Days</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span></span></span>')
			);
		}).on('finish.countdown', function(event){
			$this.parent().hide();
		});
	});
	
	$('.banner-countdown2').each(function(event){
		$this = $(this);
		$current_time 	= new Date().getTime();
		$countdown_time = $(this).data('cdtime');
		var $austDay 	= new Date();
		$austDay 		= new Date( $countdown_time * 1000 );	
		if( $countdown_time.length > 0 && $current_time > $countdown_time ){
			$this.parent().hide();
			return ;
		}
		if( $countdown_time.length <= 0 ){
				$this.parent().hide();
			return ;
		}
		$this.countdown($austDay, function(event) {
			$(this).html(
				event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">D</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span><span class="countdown-period">H</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span><span class="countdown-period">M</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span><span class="countdown-period">S</span></span></span>')
			);
		}).on('finish.countdown', function(event){
			$this.parent().hide();
		});
	});
	
	$('.mobile-layout-style2 .item-countdown').each(function(event){
		$this = $(this);
		$current_time 	= new Date().getTime();
		$countdown_time = $(this).data('cdtime');
		var $austDay 	= new Date();
		$austDay 		= new Date( $countdown_time * 1000 );	
		if( $countdown_time.length > 0 && $current_time > $countdown_time ){
			$this.parent().hide();
			return ;
		}
		if( $countdown_time.length <= 0 ){
				$this.parent().hide();
			return ;
		}
		$this.countdown($austDay, function(event) {
			$(this).html(
					event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">D</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span><span class="countdown-period">H</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span><span class="countdown-period">M</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span><span class="countdown-period">S</span></span></span>')
			);
		}).on('finish.countdown', function(event){
			$this.parent().hide();
		});
	});
	
	$('.style-mobile-countdown .slider .product-countdown').each(function(event){
		var $this = $(this);
		var parent_target = $this.parents().eq(1);
		var item_target 	= parent_target.find( '.item-price' );
		var $current_time = new Date().getTime();
		var $price				= $(this).data( 'price' ); 
		var $cd_date			= $(this).data( 'date' ); 
		var $start_time 	= $(this).data('starttime') * 1000;
		var $countdown_time = $(this).data('cdtime') * 1000;
		var $austDay 			= new Date( $cd_date * 1000 );	
		if( $start_time > $current_time  ){
			$this.remove();
			return ;
		}
		if( $countdown_time > 0 && $current_time > $countdown_time ){
			$this.remove();
			return ;
		}
		if( $countdown_time <= 0 ){
			$this.remove();
			return ;
		}
		$this.countdown($austDay, function(event) {
			$(this).html(
				event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">D</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span><span class="countdown-period">H</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span><span class="countdown-period">M</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span><span class="countdown-period">S</span></span></span>')
			);
		}).on('finish.countdown', function(event){
			$(this).hide('slow', function(){ $(this).remove(); });	
			item_target.find( '> span' ).hide('slow', function(){ item_target.find( '> span' ).remove();
			item_target.append( '<span><span class="amount">' + $price + '</span></span>' ); });	
		});
	});
	$('.sw-tab-countdown .product-countdown').each(function(event){
		var $this = $(this);
		var parent_target = $this.parents().eq(1);
		var item_target 	= parent_target.find( '.item-price' );
		var $current_time = new Date().getTime();
		var $price				= $(this).data( 'price' ); 
		var $cd_date			= $(this).data( 'date' ); 
		var $start_time 	= $(this).data('starttime') * 1000;
		var $countdown_time = $(this).data('cdtime') * 1000;
		var $austDay 			= new Date( $cd_date * 1000 );	
		if( $start_time > $current_time  ){
			$this.remove();
			return ;
		}
		if( $countdown_time > 0 && $current_time > $countdown_time ){
			$this.remove();
			return ;
		}
		if( $countdown_time <= 0 ){
			$this.remove();
			return ;
		}
		$this.countdown($austDay, function(event) {
			$(this).html(
				event.strftime('<span class="countdown-row countdown-show4"><span class="countdown-section days"><span class="countdown-amount">%D</span><span class="countdown-period">days</span></span><span class="countdown-section hours"><span class="countdown-amount">%H</span><span class="countdown-period">hours</span></span><span class="countdown-section mins"><span class="countdown-amount">%M</span><span class="countdown-period">mins</span></span><span class="countdown-section secs"><span class="countdown-amount">%S</span><span class="countdown-period">secs</span></span></span>')
			);
		}).on('finish.countdown', function(event){
			$(this).hide('slow', function(){ $(this).remove(); });	
			item_target.find( '> span' ).hide('slow', function(){ item_target.find( '> span' ).remove();
			item_target.append( '<span><span class="amount">' + $price + '</span></span>' ); });	
		});
	});
})(jQuery);