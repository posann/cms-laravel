{{-- Force default light theme for Filament (one-time migration)
<script>
(function() {
  try {
    const migratedKey = 'filament_theme_migrated_to_light_default_v1';
    if (!localStorage.getItem(migratedKey)) {
      const theme = localStorage.getItem('theme');
      if (!theme || theme === 'dark') {
        localStorage.setItem('theme', 'light');
      }
      localStorage.setItem(migratedKey, '1');
    }
    // Ensure the document attribute is set immediately
    document.documentElement.setAttribute('data-theme', localStorage.getItem('theme') || 'light');
  } catch (e) {}
})();
</script> --}}
