function toggleMenu() {
    var navbar = document.querySelector("ul.navbar");
    navbar.classList.toggle("active");}

const breedInput = document.getElementById('breed-input');

document.querySelector('.search-container button').addEventListener('click', function() {
   
    const breed = breedInput.value;


});



document.querySelector('.search-container button').addEventListener('click', searchBreed);

 function likePost(postId) {
 
  $.ajax({
      url: 'like.php',
      type: 'POST',
      data: { postId: postId },
      success: function(response) {
         
      },
      error: function(xhr, status, error) {
     
      }
  });
}
function commentPost(postId) {
  
  $.ajax({
      url: 'comment.php',
      type: 'POST',
      data: { postId: postId },
      success: function(response) {
         
      },
      error: function(xhr, status, error) {
       
      }
  });
}

document.querySelector('.feed-link').addEventListener('click', function() {
   
    document.body.classList.add('blur');

    
    const promptMessage = 'Please log in to continue.';
    const loginButton = '<button onclick="location.href=\'form.html\'">Login</button>';
  
});
$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
       items: 1,
       loop: true,
       margin: 10,
       nav: true,
       autoplay: true,
       autoplayTimeout: 3000,
       responsiveClass: true,
       responsive: {
          0: {
             items: 1,
          },
          600: {
             items: 2,
          },
          1000: {
             items: 3,
          },
       },
    });
 });
 document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("feedback");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

       
        fetch("feedback.php", {
            method: "POST",
            body: new FormData(form),
        })
        .then(response => response.json()) 
        .then(data => {
          
            console.log(data); 
            if (data.success) {
                alert("Feedback submitted successfully!");
                form.reset();
            } else {
                alert("Error submitting feedback. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});


