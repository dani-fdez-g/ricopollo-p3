const video = document.getElementById('video');
const svg = document.getElementById('svg');
const newSvg = document.getElementById('new-svg');
svg.addEventListener("mouseover", function() {
    newSvg.style.display = "block";
    svg.style.display = "none";
  });
  
  svg.addEventListener("mouseout", function() {
    newSvg.style.display = "none";
    svg.style.display = "block";
  });
video.addEventListener("timeupdate", function () {
    console.log(video.currentTime)
    if(video.currentTime >= 20 && video.currentTime < 26){
        svg.style.display ="block";
        
    }else{
        svg.style.display ="none";
    }
});


