//carasel

const caraselimg1 = document.getElementById('carasel1');
const caraselimg2 = document.getElementById('carasel2');
const caraselimg3 = document.getElementById('carasel3');
const caraselback = document.getElementById('carasel_back');
const caraselforward = document.getElementById('carasel_forward');

caraselback.addEventListener('click', function() {
  if (caraselimg1.style.display === 'block') {
    // If the first image is displayed, switch to the last image
    hideAllImages();
    caraselimg3.style.display = 'block';
  } else if (caraselimg2.style.display === 'block') {
    // If the second image is displayed, switch to the first image
    hideAllImages();
    caraselimg1.style.display = 'block';
  } else {
    // If the third image is displayed, switch to the second image
    hideAllImages();
    caraselimg2.style.display = 'block';
  }
});

caraselforward.addEventListener('click', function() {
  if (caraselimg1.style.display === 'block') {
    // If the first image is displayed, switch to the second image
    hideAllImages();
    caraselimg2.style.display = 'block';
  } else if (caraselimg2.style.display === 'block') {
    // If the second image is displayed, switch to the third image
    hideAllImages();
    caraselimg3.style.display = 'block';
  } else {
    // If the third image is displayed, switch to the first image
    hideAllImages();
    caraselimg1.style.display = 'block';
  }
});

// Function to hide all images
function hideAllImages() {
  caraselimg1.style.display = 'none';
  caraselimg2.style.display = 'none';
  caraselimg3.style.display = 'none';
}

// Initially show the first image
hideAllImages();
caraselimg1.style.display = 'block';
