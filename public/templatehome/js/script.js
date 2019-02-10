// Slide Header
let slideIndex = 1;
showSlides(slideIndex);
function plusSlides (n){
    showSlides(slideIndex += 1)
}
function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slides[slideIndex-1].style.display = "block";  
  }
//  Slide Story
  let storyIndex = 1;
  showStory(storyIndex);
  function plusStory (n){
      showStory(storyIndex += 1)
  }
  function currentStory(n) {
      showStory(storyIndex = n);
    }
    
    function showStory(n) {
      let i;
      var story = document.getElementsByClassName("myStory");
      if (n > story.length) {storyIndex = 1}    
      if (n < 1) {storyIndex = story.length}
      for (i = 0; i < story.length; i++) {
          story[i].style.display = "none";  
      }
      story[storyIndex-1].style.display = "block";  
    }

    
    function zoom(){
        let imgProduk = document.getElementById('imgProduk');
        imgProduk.msTransform = scale(1.5);
        imgProduk.webkitTransform = scale(1.5);   
        imgProduk.transform = scale(1.5);   
    } 