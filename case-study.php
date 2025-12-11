<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crave | Case Study</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.svg">
    <link rel="stylesheet" href="styles/styles.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap"
      rel="stylesheet"
    >
  </head>
  <body>

    <!-- DB Connection -->
    <?php require_once "includes/db.php"; ?>

    <!-- Header -->
    <?php include_once "includes/header.php"; ?>

    <main class="recipe-page-main case-study">
      <!-- Page Header with Hero Image -->
      <div class="page-header">
        <img src="assets/case-study-hero.avif" alt="Crave Hero" class="page-header-image" loading="lazy">
      </div>

      <!-- Table of Contents Sidebar -->
      <div class="table-of-contents-container">
        <div class="table-of-contents-card">
          <h3>Contents</h3>
          <button type="button" class="content-btn" data-target="overview">Overview</button>
          <button type="button" class="content-btn" data-target="context">Context & Challenge</button>
          <button type="button" class="content-btn" data-target="process">Process & Insight</button>
          <button type="button" class="content-btn" data-target="solution">The Solution</button>
          <button type="button" class="content-btn" data-target="results">The Results</button>
        </div>
      </div>

      <div class="case-study-container">
        <!-- Overview Section -->
        <div class="text-image-container" id="overview">
          <div class="text-column">
            <h2 class="title">Overview</h2>
            <p class="description">Crave is a responsive web application that allows users to browse, search, and filter recipes, making it easy to quickly find your next meal. This application was built using PHP, MySQL, JS, and HTML/CSS.</p>
          </div>
        </div>

        <!-- Background Section -->
        <div class="text-image-container" id="context">
          <div class="text-column">
            <h2 class="title">Project Background</h2>
            <p class="description">This project was created for an assignment to build a custom online cookbook application. We were given a set of recipe PDFs and related images, and the goal was to design and develop our own branded platform that could display the recipes and allow users to browse, search, and filter through the content.</p>
          </div>
        </div>

        <!-- Process and Insight Section -->
        <div class="text-image-container" id="process">
          <div class="text-column">
            <h2 class="title">Process & Insight</h2>
            <p class="description"><strong>Development Strategy:</strong> I started by organizing all the recipe data in Excel, which helped me clearly break down each recipe into consistent fields (title, protein type, description, ingredients, etc.). After cleaning the data, I imported it into phpMyAdmin and set up my own MySQL database. Once the data was structured, I connected it to the front-end using PHP and wrote selective SQL queries so the platform only fetches what it needs, making everything load faster.</p>
            <p class="description"><strong>Key Achievements:</strong></p>
            <ul style="padding-left: 20px;">
              <li>Organized and cleaned recipe data in Excel before importing into MySQL</li>
              <li>Created a custom database in phpMyAdmin with clearly defined fields</li>
              <li>Wrote optimized SQL queries to reduce unnecessary data loading</li>
              <li>Built a mobile-first responsive layout</li>
              <li>Created API routes that return recipes in JSON</li>
            </ul>
            <p class="description"><strong>Key Insight:</strong> My biggest challenge here was to find ways to optimize performance. Lazy loading had the biggest impact in cutting load times by about 60% and making the entire site feel much faster. In the future, I would've liked to explore pagination.</p>
            
            <!-- Process Images Side by Side -->
            <div class="process-images">
              <img src="assets/process-technical.avif" alt="Process & Insight" class="process-image" loading="lazy">
              <img src="assets/process-design.avif" alt="Process & Insight Design" class="process-image" loading="lazy">
            </div>
          </div>
        </div>

        <!-- Solution Section -->
        <div class="text-image-container" id="solution">
          <div class="text-column">
            <h2 class="title">The Solution</h2>
            <p class="description">Crave provides a clean, intuitive recipe discovery experience.</p>
            <ul style="padding-left: 20px;">
              <li><strong>Homepage:</strong> Featured recipes and curated lists</li>
              <li><strong>Search & Filtering:</strong> Multi-field search with filter options</li>
              <li><strong>Recipe Cards:</strong> Responsive grid layout</li>
              <li><strong>Recipe Details:</strong> Ingredients, instructions, and metadata, and images</li>
              <li><strong>Responsive Navigation:</strong> Hamburger menu on mobile, horizontal nav on desktop</li>
              <li><strong>API Support:</strong> JSON endpoints for all recipes and individual recipes</li>
            </ul>
            <img src="assets/solution.avif" alt="The Solution" class="solution-full-width-image" loading="lazy">
          </div>
        </div>

        <!-- Results Section -->
        <div class="text-image-container" id="results">
          <div class="text-column">
            <h2 class="title">The Results</h2>
            <p class="description"><strong>Success Metrics:</strong></p>
            <ul style="padding-left: 20px;">
              <li><strong>Performance:</strong> Page load time reduced from 7s to under 2s</li>
              <li><strong>Responsiveness:</strong> 100% mobile compatibility</li>
              <li><strong>Usability:</strong> Recipes can be found in 3 clicks or less</li>
              <li><strong>Features:</strong> 37 recipes with search and filtering</li>
              <li><strong>Visual Design:</strong> Clean and consistent layout and branding</li>
            </ul>
            <p class="description"><strong>Conclusion:</strong> This project pushed me to think beyond just the interface and understand how data actually moves through a system. I also got to practice building more modular components and following better coding best practices, which helped keep the project organized and easier to maintain. As for the UX side, although I didn’t get the chance to run full user tests on Crave, I hope to revisit the application in the future to refine it based on real user feedback and continue to grow my developemnt skills.</p>
          </div>
          <div class="image-column">
            <img src="assets/results.png" alt="The Results" class="recipe-image-large" loading="lazy">
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <?php include_once "includes/footer.php";?>
    
    <!-- Close Connection -->
    <?php include_once "includes/db-close.php"; ?>
    
    <script src="scripts/main.js"></script>
  </body>
</html>
