const filterOptions = [
  "Chicken",
  "Beef",
  "Pork",
  "Fish",
  "Turkey",
  "Vegetarian",
];

// Add filters
function renderFilterOptions() {
  const filterCard = document.querySelector(".filter-card .filter-options");
  if (filterCard) {
    filterOptions.forEach((option) => {
      const label = document.createElement("label");
      label.className = "filter-option";
      label.innerHTML = `
        <input type="checkbox" name="filter" value="${option}">
        <span class="checkmark"></span>
        ${option}
      `;
      filterCard.appendChild(label);
    });
  }
}

// Clear filters
function clearFilters() {
  const clearBtn = document.querySelector(".clear-filters-btn");
  if (clearBtn) {
    clearBtn.onclick = function () {
      document
        .querySelectorAll('.filter-option input[type="checkbox"]')
        .forEach((cb) => (cb.checked = false));
    };
  }
}

// Mobile filter card
const filterBtn = document.querySelector(".mobile-filter-btn");
const filterCard = document.querySelector(".filter-card");
const closeFiltersBtn = document.querySelector(".close-filters-btn");

if (filterBtn) {
  filterBtn.addEventListener("click", () => {
    filterCard.classList.add("active");
    document.body.classList.add('filter-overlay-open');
  });
}

if (closeFiltersBtn) {
  closeFiltersBtn.addEventListener("click", () => {
    filterCard.classList.remove("active");
    document.body.classList.remove('filter-overlay-open');
  });
}

// Recipe card mockup
function cloneRecipeCards() {
  const card = document.querySelector(".recipe-card");
  const container = document.querySelector(".recipe-cards");
  if (card && container) {
    for (let i = 0; i < 10; i++) {
      container.appendChild(card.cloneNode(true));
    }
  }
}

function initialize() {
  renderFilterOptions();
  clearFilters();
  cloneRecipeCards();
  scrollToSection();
}

// Prevent link from adding to url
function scrollToSection() {
  const contentBtns = document.querySelectorAll('.content-btn[data-target]');
  if (!contentBtns || contentBtns.length === 0) return;

  contentBtns.forEach((btn) => {
    btn.addEventListener('click', (event) => {
      const id = btn.getAttribute('data-target');
      const target = document.getElementById(id);
      if (!target) return;

      target.scrollIntoView();
    });
  });
}

window.addEventListener('DOMContentLoaded', initialize);