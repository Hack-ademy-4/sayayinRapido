export const $ = el => document.querySelector(el);
export const $$ = el => document.querySelectorAll(el);
export const $on = (ev, el, callback, all = false) => {
	const selectEl = $(el);
	if (selectEl) {
		if (all) {
			$$(el).forEach(e => e.addEventListener(ev, callback));
		} else {
			selectEl.addEventListener(ev, callback);
		}
	}
};

require('./bootstrap');

//Ocultar la notificacion tras 5 segundos
window.addEventListener("load", () => {
	setTimeout(() => {
		$$(".alert").forEach(el => {
			el.style.display = "none";
		});
	}, 5000);
});

window.newAds = (token) => {
	import("./newAd.js").then(({init}) => {
		init(token);
	});
};