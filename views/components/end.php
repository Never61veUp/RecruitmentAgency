<link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
<script>
    const headerHeight = document.querySelector('header').offsetHeight;
    const myDiv = document.getElementById('myDiv');
    myDiv.style.minHeight = `calc(100vh - ${headerHeight}px)`;
</script>
</body>
</html>
