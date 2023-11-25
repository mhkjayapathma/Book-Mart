window.addEventListener("scroll", () => {
    document.querySelector(".background").style.backgroundSize = `${window.scrollY * 1.8 + 1600}px`;
    document.querySelector(".background h1").style.opacity = `${(-window.scrollY + 300) * 0.004}`;
  });
fetch('header.html')
  .then(response => response.text())
  .then(html => {
    document.getElementById('headerContainer').innerHTML = html;
}); 
fetch('footer.html')
  .then(response => response.text())
  .then(html => {
    document.getElementById('footerContainer').innerHTML = html;
}); 