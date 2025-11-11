document.addEventListener('DOMContentLoaded', function() {
  const sliderComponents = document.querySelectorAll('.slider-component');
  sliderComponents.forEach(function(component) {
    const slides = component.querySelectorAll('.slide');
    const dots = component.querySelectorAll('.dot');

    if (dots.length === 0) return; // no controls if single image

    function setActive(index) {
      slides.forEach(s => s.classList.remove('active'));
      dots.forEach(d => d.classList.remove('active'));
      if (slides[index]) slides[index].classList.add('active');
      if (dots[index]) dots[index].classList.add('active');
    }

    dots.forEach(dot => {
      dot.addEventListener('click', function(e) {
        const idx = parseInt(this.getAttribute('data-index'), 10);
        setActive(idx);
      });
    });
  });
});
