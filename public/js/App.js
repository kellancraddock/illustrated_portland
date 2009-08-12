function App(element) {
	this.root = element;
	var self = this;
	
	this.construct = function() {
		
		//Bind colobox events
		$(".donate").colorbox({width:"35%", inline:true, href:"#donate"});
		
		//Gallery
		var gallery = new Gallery(self.root);
		
		//External Links
		new ExternalLinks(self.root);
	}
}