      <footer class="footer px-4 text-center">
        <div>Futuromed &copy; {{ now()->year }}</div>
      </footer>
    
    <script>
      const header = document.querySelector('header.header');
      
      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
      
    </script>