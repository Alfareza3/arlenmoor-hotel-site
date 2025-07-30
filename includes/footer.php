<footer class="bg-dark text-white py-4 mt-auto">
  <div class="container text-center">
    <p class="mb-1">&copy; <?= date('Y'); ?> <strong>The Arlenmoor</strong>. All rights reserved.</p>
  </div>
</footer>

<audio id="bg-music" loop autoplay>
  <source src="assets/music/classical-elegance-piano-music-305887.mp3" type="audio/mpeg">
  Browser Anda tidak mendukung elemen audio.
</audio>

<script>
  const audio = document.getElementById('bg-music');
  window.addEventListener('load', () => {
    const wasPlaying = localStorage.getItem('bgmusic') === 'play';
    if (wasPlaying || !localStorage.getItem('bgmusic')) {
      audio.play().then(() => {
        localStorage.setItem('bgmusic', 'play');
      }).catch(err => {
        console.log("Autoplay ditolak oleh browser:", err);
      });
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
