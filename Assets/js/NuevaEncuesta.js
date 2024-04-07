//Crear inputs dinamicos
document.getElementById('addButton').addEventListener('click', function(e) {
    e.preventDefault();
    const container = document.getElementById('container');
    const label = document.createElement('label');
    const input = document.createElement('input');
    const count = container.getElementsByTagName('input').length;
    label.textContent = 'Integrante ' + (count + 1);
    label.htmlFor = 'newInput' + count;
    input.id = 'newInput' + count;
    input.name = 'newInput' + count;
    input.type = 'text';
    input.className = 'form-control';
    container.appendChild(label);
    container.appendChild(input);
});

document.getElementById('removeButton').addEventListener('click', function(e) {
    e.preventDefault();
    var container = document.getElementById('container');
    if (container.lastChild) {
        container.removeChild(container.lastChild); // remove input
        if (container.lastChild) {
            container.removeChild(container.lastChild); // remove label
        }
        var count = container.getElementsByTagName('input').length;
        document.getElementById('inputCount').value = count;
    }
});