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
const filterForm = document.querySelector(".filter-form");
const closeFiltersBtn = document.querySelector(".close-filters-btn");

if (filterBtn) {
  filterBtn.addEventListener("click", () => {
    filterForm.classList.add("active");
    document.body.classList.add("filter-form-open");
  });
}

if (closeFiltersBtn) {
  closeFiltersBtn.addEventListener("click", () => {
    filterForm.classList.remove("active");
    document.body.classList.remove("filter-form-open");
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
  clearFilters();
  scrollToSection();
}

window.addEventListener("DOMContentLoaded", initialize);
