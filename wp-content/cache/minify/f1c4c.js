jQuery(function(t){if("undefined"==typeof wc_single_product_params)return!1;t("body").on("init",".wc-tabs-wrapper, .woocommerce-tabs",function(){t(".wc-tab, .woocommerce-tabs .panel:not(.panel .panel)").hide();var e=window.location.hash,i=window.location.href,a=t(this).find(".wc-tabs, ul.tabs").first();e.toLowerCase().indexOf("comment-")>=0||"#reviews"===e||"#tab-reviews"===e?a.find("li.reviews_tab a").click():i.indexOf("comment-page-")>0||i.indexOf("cpage=")>0?a.find("li.reviews_tab a").click():a.find("li:first a").click()}).on("click",".wc-tabs li a, ul.tabs li a",function(e){e.preventDefault();var i=t(this),a=i.closest(".wc-tabs-wrapper, .woocommerce-tabs");a.find(".wc-tabs, ul.tabs").find("li").removeClass("active"),a.find(".wc-tab, .panel:not(.panel .panel)").hide(),i.closest("li").addClass("active"),a.find(i.attr("href")).show()}).on("click","a.woocommerce-review-link",function(){return t(".reviews_tab a").click(),!0}).on("init","#rating",function(){t("#rating").hide().before('<p class="stars"><span><a class="star-1" href="#">1</a><a class="star-2" href="#">2</a><a class="star-3" href="#">3</a><a class="star-4" href="#">4</a><a class="star-5" href="#">5</a></span></p>')}).on("click","#respond p.stars a",function(){var e=t(this),i=t(this).closest("#respond").find("#rating"),a=t(this).closest(".stars");return i.val(e.text()),e.siblings("a").removeClass("active"),e.addClass("active"),a.addClass("selected"),!1}).on("click","#respond #submit",function(){var e=t(this).closest("#respond").find("#rating"),i=e.val();if(e.length>0&&!i&&"yes"===wc_single_product_params.review_rating_required)return window.alert(wc_single_product_params.i18n_required_rating_text),!1}),t(".wc-tabs-wrapper, .woocommerce-tabs, #rating").trigger("init");var e=function(e,i){this.$target=e,this.$images=t(".woocommerce-product-gallery__image",e),0!==this.$images.length?(e.data("product_gallery",this),this.zoom_enabled=t.isFunction(t.fn.zoom)&&wc_single_product_params.zoom_enabled,this.photoswipe_enabled="undefined"!=typeof PhotoSwipe&&wc_single_product_params.photoswipe_enabled,i&&(this.zoom_enabled=!1!==i.zoom_enabled&&this.zoom_enabled,this.photoswipe_enabled=!1!==i.photoswipe_enabled&&this.photoswipe_enabled),this.initZoom=this.initZoom.bind(this),this.initPhotoswipe=this.initPhotoswipe.bind(this),this.getGalleryItems=this.getGalleryItems.bind(this),this.openPhotoswipe=this.openPhotoswipe.bind(this),this.zoom_enabled&&(this.initZoom(),e.on("woocommerce_gallery_init_zoom",this.initZoom)),this.photoswipe_enabled&&this.initPhotoswipe()):this.$target.css("opacity",1)};e.prototype.initZoom=function(){var e=this.$images,i=this.$target.width(),a=!1;if(t(e).each(function(e,o){if(t(o).find("img").data("large_image_width")>i)return a=!0,!1}),a){var o={touch:!1};"ontouchstart"in window&&(o.on="click"),e.trigger("zoom.destroy"),e.zoom(o)}},e.prototype.initPhotoswipe=function(){this.zoom_enabled&&this.$images.length>0&&(this.$target.find(".product-responsive").prepend('<a href="#" class="woocommerce-product-gallery__trigger">🔍</a>'),this.$target.on("click",".woocommerce-product-gallery__trigger",this.openPhotoswipe)),this.$target.on("click",".woocommerce-product-gallery__image a",this.openPhotoswipe)},e.prototype.getGalleryItems=function(){var e=this.$images,i=[];return e.length>0&&e.each(function(e,a){if("video"==t(a).data("type"))s={html:'<div class="popup-video"><div class="video-wrapper"><iframe width="560" height="315" src="'+t(a).data("video")+'" frameborder="0" allowfullscreen></iframe></div></div>'};else var o=t(a).find("img"),s={src:o.attr("data-large_image"),w:o.attr("data-large_image_width"),h:o.attr("data-large_image_height"),title:o.attr("data-caption")?o.attr("data-caption"):o.attr("title")};i.push(s)}),console.log(i),i},e.prototype.openPhotoswipe=function(e){e.preventDefault();var i,a=t(".pswp")[0],o=this.getGalleryItems(),s=t(e.target);i=s.is(".woocommerce-product-gallery__trigger")?this.$target.find(".slick-active"):s.closest(".woocommerce-product-gallery__image");var r={index:t(i).index(),shareEl:!1,closeOnScroll:!1,history:!1,hideAnimationDuration:0,showAnimationDuration:0},n=new PhotoSwipe(a,PhotoSwipeUI_Default,o,r);n.init(),n.listen("beforeChange",function(){var e=t(n.currItem.container);t(".popup-video").removeClass("active");e.find(".popup-video").addClass("active");t(".popup-video").each(function(){t(this).hasClass("active")||t(this).attr("src",t(this).attr("src"))})})},t.fn.wc_product_gallery=function(t){return new e(this,t),this},t(".woocommerce-product-gallery").each(function(){t(this).wc_product_gallery()}),t(".sw-radio-variation").each(function(){t(this).click(function(){t(this).addClass("selected").siblings().removeClass("selected")})})});