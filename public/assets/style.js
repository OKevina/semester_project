// Get the content element
const contentElement = document.querySelector('.content');

// Add an event listener for the animation end event
contentElement.addEventListener('animationend', function() {
  // Once the animation has finished, set the opacity of the h3 element to 1
  contentElement.querySelector('h3').style.opacity = 1;
});