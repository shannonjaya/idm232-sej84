// Recipe card mockup
function cloneRecipeCards() {
  const recipeCard = document.querySelector(".recipe-card");
  const recipeContainer = document.querySelector(".recipe-cards-container");
  if (recipeCard && recipeContainer) {
    for (let i = 0; i < 10; i++) {
      const clone = recipeCard.cloneNode(true);
      recipeContainer.appendChild(clone);
    }
  }
}

const filterOptions = [
  "Chicken",
  "Beef",
  "Pork",
  "Fish",
  "Turkey",
  "Vegetarian",
];

// Add filters to filter card
function renderFilterOptions() {
  const filterContainer = document.querySelector(
    ".filter-overlay .filter-options"
  );
  if (filterContainer) {
    filterOptions.forEach((option) => {
      const label = document.createElement("label");
      label.className = "filter-option";
      label.innerHTML = `
        <input type="checkbox" name="filter" value="${option}">
        <span class="checkmark"></span>
        <span class="option-label">${option}</span>
      `;
      filterContainer.appendChild(label);
    });
  }
}

// Clear filters
function clearFilters() {
  const clearBtn = document.querySelector(".clear-filters-btn");
  if (clearBtn) {
    clearBtn.addEventListener("click", () => {
      document
        .querySelectorAll('.filter-option input[type="checkbox"]')
        .forEach((cb) => (cb.checked = false));
    });
  }
}

// Mobile filter overlay
const filterBtn = document.querySelector(".mobile-filter-btn");
const filterOverlay = document.querySelector(".filter-overlay");
const closeFiltersBtn = document.querySelector(".close-filters-btn");

if (filterBtn) {
  filterBtn.addEventListener("click", () => {
    filterOverlay.classList.add("active");
    document.body.classList.add("filter-overlay-open");
  });
}

if (closeFiltersBtn) {
  closeFiltersBtn.addEventListener("click", () => {
    filterOverlay.classList.remove("active");
    document.body.classList.remove("filter-overlay-open");
  });
}

// Scroll to section functionality
function scrollToSection() {
  const contentBtns = document.querySelectorAll(".content-btn[data-target]");
  if (!contentBtns || contentBtns.length === 0) return;

  contentBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const id = btn.getAttribute("data-target");
      const target = document.getElementById(id);
      if (target) {
        target.scrollIntoView();
      }
    });
  });
}

function initialize() {
  renderFilterOptions();
  clearFilters();
  cloneRecipeCards();
  scrollToSection();
}

window.addEventListener("DOMContentLoaded", initialize);
