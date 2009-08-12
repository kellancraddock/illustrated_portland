function Gallery(element) {
	var self = this;
	this.root = element;
	this.full = $('#big_thumb');
	this.thumb = $('.thumb');
	
	this.bindThumbs = function() {
		self.thumb.bind('click', function() {
			self.thumb.removeClass('active');
			$(this).addClass('active');
			self.loadFull($(this).children('img').attr('src'));
		});
	}()
	
	this.loadFull = function(src) {
		self.full.animate({
			opacity: 0
		}, 200, function() {
			$(this).attr('src', src).animate({
				opacity: 1
			});
		});
	}
}