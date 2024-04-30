function show(){
    const mypass =document.getElementById("sandi")
    // const button = document.getElementById("klik")

    if(mypass.type == "password"){
        mypass.type ="text"
    }else{
      mypass.type="password"
    }
}
// var video = document.getElementById('myVideo');

// // Play the video when it's ready
// video.addEventListener('canplay', function() {
//     video.play();
// });

var currentVideo = document.getElementById('myVideo');

// Membuat fungsi untuk menghentikan pemutaran video saat video lain dimulai
function stopOtherVideos() {
    var videos = document.getElementsByTagName('video');
    for (var i = 0; i < videos.length; i++) {
        if (videos[i] !== currentVideo) {
            videos[i].pause();
        }
    }
}

// Menambahkan event listener untuk menghentikan video lain saat video saat ini dimainkan
currentVideo.addEventListener('play', function() {
    stopOtherVideos();
});
