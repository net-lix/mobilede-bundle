
var apiUrl = 'https://pdir.de/api/mobilede/';

window.addEvent('domready', function() {

	// dev log
    var devlogUrl = 'https://pdir.de/share/mobilede-devlog.xml';
    var devlog = $('mobileDeDevLog');

    getApiStatus();

    if(devlog) {
        var req = new Request.HTML({
            method: 'get',
            url: devlogUrl,
            onSuccess: function(tree, elements, html) {
                var temp = new Element('div').set('html', html);

                temp.getElements("item").each(function(el) {
                    var d = new Date(el.getElements("pubdate")[0].innerText);
                    var currDate = ((d.getDate()<10)? "0"+d.getDate(): d.getDate());
                    var currMonth = ((d.getMonth()<10)? "0"+(d.getMonth()+1): (d.getMonth()+1));
                    var curr_year = d.getFullYear();
                    var itemHTML = "<span>"+currDate + "." + currMonth + "." + curr_year+"</span>";
                    itemHTML += "<span>"+el.getElements("title")[0].innerText+"</span>";
                    // itemHTML += "<a href=""+el.getElements("guid")[0].innerText+"" target="_blank"> [ lesen ] </a>";
                    itemHTML += "<div>"+el.getElements("description")[0].innerText.replace("]]>", "")+"</div>";

                    var newItem = new Element("div").addClass("item").set("html", itemHTML);
                    devlog.adopt(newItem);
                });
            }
        }).send();
    }

});

function getApiStatus() {

	jQuery.ajax({
		type: "GET",
		contentType: "application/json",
		url: apiUrl,
		success: function(data, textStatus, jqXHR){
			jQuery("#spushApiStatus").addClass("blink");
		},
		error: function(jqXHR, textStatus, errorThrown){
			jQuery("#spushApiStatus").addClass("red");
		}
	});
}