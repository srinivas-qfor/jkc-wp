/*Cookies Blocked Setup: Applies to sites that use Blue Kai tracking data*/
var addthis_config = {
    data_use_cookies: false,
    data_use_flash: false,
    data_ga_property: 'UA-20286639-2',    
    data_ga_social: true
};

/*Open Addthis on click, not hover*/
if (typeof addthis_config !== "undefined") {
	addthis_config.ui_click = true
} else {
	var addthis_config = {
		ui_click: true
	};
}