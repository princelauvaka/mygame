$( document ).ready(function() {
        //Close cart
    $(document).on('click','.duser',function(e){
    		e.preventDefault();
    		// console.log('testing');
        	$('.areyousure').slideDown(100);
    });

});