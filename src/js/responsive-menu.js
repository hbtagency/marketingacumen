$("#search-icon").click(function(){
    if($(this).siblings(".search-form").hasClass("hidden")){
        $(this).siblings(".search-form").removeClass("hidden");
    }
    else{
        $(this).siblings(".search-form").addClass("hidden");
    }
});

