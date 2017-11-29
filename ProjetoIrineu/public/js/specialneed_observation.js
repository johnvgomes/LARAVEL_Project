var cbs = document.getElementsByClassName('cb');

function cbClick() {
    var input = document.querySelector('input[id="' + this.getAttribute('id') + '"]:not([type="checkbox"])');
    input.disabled = !this.checked;
}

for(var i in cbs) {
    cbs[i].onclick = cbClick;
}