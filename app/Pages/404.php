<!-- display not found in an elegant way -->
  <style>
    body {
      background-color: #f3f3f3;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      text-align: center;
    }

    .title {
      font-size: 8rem;
      color: #ff3860;
      margin-bottom: 1rem;
    }

    .subtitle {
      font-size: 2rem;
      margin-bottom: 2rem;
    }

    .home-link {
      color: #ff3860;
      font-size: 1.25rem;
      text-decoration: none;
      transition: color 0.3s ease-in-out;
    }

    .home-link:hover {
      color: #f06292;
    }
  </style>

  <div class="container">
    <h1 class="title">404</h1>
    <h2 class="subtitle">Page Not Found</h2>
    <p>Oops! The page you are looking for does not exist.</p>
    <a class="home-link" href="/dashboard">Go back to the homepage</a>
  </div>

