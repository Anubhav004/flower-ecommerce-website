// Get the dropdown button and content
var dropdownBtn = document.querySelector(".dropdown > a");
var dropdownContent = document.querySelector(".dropdown-content");

// Show the dropdown content when the user hovers over the button
dropdownBtn.addEventListener("mouseover", function() {
  dropdownContent.classList.add("show");
});

// Hide the dropdown content when the user stops hovering over the button
dropdownBtn.addEventListener("mouseout", function() {
  dropdownContent.classList.remove("show");
});

// Hide the dropdown content when the user clicks outside of it
window.addEventListener("click", function(event) {
  if (!event.target.matches('.dropbtn')) {
    if (dropdownContent.classList.contains('show')) {
      dropdownContent.classList.remove('show');
    }
  }
});
