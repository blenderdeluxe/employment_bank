
$('.show_confirm').click(function(e) {
	var ans = confirm('Are you sure ? ');
	if(!ans){
		e.preventDefault();
	}
});