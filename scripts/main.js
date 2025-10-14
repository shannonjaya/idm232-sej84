// Filter 

const options = [
  "Chicken",
  "Beef",
  "Pork",
  "Fish",
  "Turkey",
  "Vegetarian",
];

window.addEventListener("DOMContentLoaded", function () {
  const filterCard = document.querySelector(".filter-card .filter-options");
  if (filterCard) {
    options.forEach((option) => {
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

  // Clear filters 
  const clearBtn = document.querySelector(".clear-filters-btn");
  if (clearBtn) {
    clearBtn.onclick = function () {
      document
        .querySelectorAll('.filter-option input[type="checkbox"]')
        .forEach((cb) => (cb.checked = false));
    };
  }

  // Recipe card mockup
  const card = document.querySelector(".recipe-card");
  const container = document.querySelector(".recipe-cards");
  if (card && container) {
    for (let i = 0; i < 10; i++) {
      container.appendChild(card.cloneNode(true));
    }
  }
});
