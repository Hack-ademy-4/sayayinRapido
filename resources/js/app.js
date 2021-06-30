/*
	ATENCION! No utilizamos jQuery porque no manipulamos demasiado el DOM y pq está obsoleto
	En vez de jQuery tienes 3 funciones $, $$, $on para que ahorres escribir
*/

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


// esta funcion en el scope window inicializa el dopzone. No quitar ni añadir require("dropzone") Esta funcion carga dropzone solo cuando la llamas. El parametro token es el csrf de laravel. Pasaselo como quieras, pero pasalo sino no va. Como he dicho esta en el scope window. Puedes llamarla cuando y donde quieras.
window.dropzone = (token) => {
	import("./my-dropzone.js").then(({init}) => {
		init(token); // <--- El token es el csrf-token
	});
};