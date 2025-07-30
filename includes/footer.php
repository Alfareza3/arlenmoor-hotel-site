<footer class="bg-dark text-white py-4 mt-auto">
  <div class="container text-center">
    <p class="mb-1">&copy; <?= date('Y'); ?> <strong>The Arlenmoor</strong>. All rights reserved.</p>
  </div>
</footer>

<!-- Musik Latar -->
<audio id="bg-music" loop>
  <source src="assets/music/classical-elegance-piano-music-305887.mp3" type="audio/mpeg">
  Browser Anda tidak mendukung elemen audio.
</audio>

<!-- Tombol Kontrol Musik -->
<div id="music-control" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
  <button onclick="toggleMusic()" class="btn btn-outline-light btn-sm rounded-circle shadow" title="Putar / Jeda Musik">
    🎵
  </button>
</div>

<script>
  const audio = document.getElementById('bg-music');
  const wasPlaying = localStorage.getItem('bgmusic') === 'play';

  // Autoplay jika sebelumnya play
  if (wasPlaying) {
    audio.play().catch(() => {
      // Autoplay bisa dicegah browser, jadi kita abaikan error-nya
    });
  }

  function toggleMusic() {
    if (audio.paused) {
      audio.play();
      localStorage.setItem('bgmusic', 'play');
    } else {
      audio.pause();
      localStorage.setItem('bgmusic', 'pause');
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
