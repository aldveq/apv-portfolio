function buildSectionsPagination() {
	document.addEventListener("DOMContentLoaded", function () {
		const sections = document.querySelectorAll(".mil-section");
		const paginationWrapperEl = document.querySelector("div.mil-pagination");

		if (sections.length) {
			if (sections.length === 1) {
				return;
			}

			let paginationItem = "";

			sections.forEach((singleSection, indexSection) => {
				paginationItem += `
							<div class="mil-dot ${indexSection === 0 ? "mil-active" : ""}" data-index="${indexSection - 1}" data-name="${singleSection.getAttribute("data-name")}"></div>
						`;
			});

			if (paginationWrapperEl) {
				paginationWrapperEl.innerHTML = paginationItem;
			}
		}
	});
}

buildSectionsPagination();
