window.addEventListener("scroll", () => {
    document.querySelector(".background").style.backgroundSize = `${window.scrollY * 1.8 + 1600}px`;
    document.querySelector(".background h1").style.opacity = `${(-window.scrollY + 300) * 0.004}`;
  });