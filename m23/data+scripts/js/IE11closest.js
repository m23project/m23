// Mozilla Contributors, Creative Commons Attribution-ShareAlike license (CC-BY-SA, http://creativecommons.org/licenses/by-sa/2.5/), v2.5 or any later version

if (!Element.prototype.matches) {
Element.prototype.matches = Element.prototype.msMatchesSelector || 
							Element.prototype.webkitMatchesSelector;
}

if (!Element.prototype.closest) {
Element.prototype.closest = function(s) {
	var el = this;

	do {
	if (Element.prototype.matches.call(el, s)) return el;
	el = el.parentElement || el.parentNode;
	} while (el !== null && el.nodeType === 1);
	return null;
};
}