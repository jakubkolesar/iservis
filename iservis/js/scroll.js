
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    var w = window.innerWidth;
  
    if(w>1000){
      if (scroll >= 150) {
        $(".navbar").addClass("navbar-white");
        $("li a").addClass("a-black");
       
      }
      else{
        $(".navbar").removeClass("navbar-white");
        $("li a").removeClass("a-black");
        
      }
    }
    else {
      if(scroll<100){
        $(".navbar").removeClass("navbar-white");
        $(".burger div").removeClass("burger-black");
        $("li a").addClass("a-black");
      }
      else{
        $(".navbar").addClass("navbar-white");
        $(".burger div").addClass("burger-black");
        $("li a").addClass("a-black");
      }
    }
    if (scroll >= 300){
      $(".arrow").addClass("arrow-none");
    }
    else {
      $(".arrow").removeClass("arrow-none");
    }
});

function background(){
  var scroll = $(window).scrollTop();
  var test = document.querySelector(".navbar");
  if (scroll<100){
    if(test.classList.contains("navbar-white")){
      $(".navbar").removeClass("navbar-white");
      $(".burger div").removeClass("burger-black");
    }
    else {
      $(".navbar").addClass("navbar-white");
      $(".burger div").addClass("burger-black");
      
    }
  }
}
  
  function navblack(){
    var path = window.location.pathname;
    var page = path.split("/").pop();
    console.log(page);
    if(page=="objednavka.php"){
      $(".navbar").addClass("navbar-white");
      $("li a").addClass("a-black");
    }
  }